//Libraries
#include<SoftwareSerial.h>
#include <ArduinoJson.h>

#include <LiquidCrystal.h>
const int rs = 2, en = 3, d4 = 4, d5 = 5, d6 = 6, d7 = 7;
LiquidCrystal lcd(rs, en, d4, d5, d6, d7);

//#include <LiquidCrystal_I2C.h>
#include <Wire.h>
// Set the LCD address to 0x27 for a 20 chars and 4 line display
//LiquidCrystal_I2C lcd(0x27, 20, 4);

#include <Servo.h>
Servo myservo; // create servo object to control a servo
const int servoPin = 9;

#include <LedControl.h> // include led control library
int DIN = 10; // define DIN pin to digital pin 10
int CS =  11; // define CS pin to digital pin 11
int CLK = 12; // define CLK to digital pin 12
LedControl lc = LedControl(DIN, CLK, CS, 0);

byte space[] = {0x01, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00}; //space byte arrays custom character
byte arrow[] = {0x08, 0x04, 0x02, 0xFF, 0x02, 0x04, 0x08, 0x00}; //blank arrow
byte filled[] = {0xF7, 0xFB, 0xFD, 0x00, 0xFD, 0xFB, 0xF7, 0xFF}; //filled Arrow
byte stopnow[] = {0x3C, 0x42, 0x85, 0x89, 0x91, 0xA1, 0x42, 0x3C}; //Stop sign

#include <SPI.h>
#include <MFRC522.h>
#define SS_PIN 53
#define RST_PIN 49 //For MFRC522 MISO: 50, MOSI: 51, SCK: 52
MFRC522 mfrc522(SS_PIN, RST_PIN); // Instance of the class

#include<stdlib.h>

#include <Keypad.h>
const byte ROWS = 4; //Keypad four rows
const byte COLS = 4; //Keypad four columns

char keys[ROWS][COLS] = {
  {'1', '2', '3', 'A'},
  {'4', '5', '6', 'B'},
  {'7', '8', '9', 'C'},
  {'*', '0', '#', 'D'}
};
byte rowPins[ROWS] = {25, 27, 29, 31}; //connect to the row pinouts of the keypad
byte colPins[COLS] = {33, 35, 37, 39}; //connect to the column pinouts of the keypad
Keypad keypad = Keypad( makeKeymap(keys), rowPins, colPins, ROWS, COLS );


struct Info {
  int id;
  char cid[12];
  char Uname[20];
  int amount;
} user[5] = { {1, "3F AD 4D 29", "Jahid Hasan Alvi", 2000},
  {2, "B0 77 BB 25", "Ekhtear Uddin Khan", 3000},
  {3, "A1 F4 78 D5", "Asha Das", 5000}
};
String platform = "TB";
//int a_amount = 5000, b_amount = 2000, c_amount = 300;
int waiting = 3000;
int sum = 0, userN, vendorID = 603;
String lcdprnt ;
void setup() {
  myservo.attach(servoPin); // attaches the servo on servopin to the servo object
  myservo.write(90);
  lc.shutdown(0, false);      //The MAX72XX is in power-saving mode on startup
  lc.setIntensity(0, 5);     // Set the brightness, the maximum is 0,15
  lc.clearDisplay(0);         // and clear the display
  printByte(stopnow);
  Serial.println("stopnow");
  lcd.begin(16, 2);
  //lcd.init();                      // initialize the lcd
  lcd.clear();
  // set cursor to first line
  lcd.setCursor(0, 0);
  // Print a message to the LCD.
  //  lcd.backlight();
  lcd.println("Welcome to UCPS");
  lcd.setCursor(0, 1);
  lcd.print("Toll Booth ");
  lcd.print(vendorID);
  delay(4000);
  lcd.clear();
  lcd.print("Enter Amount: ");

  lcdprnt = "Paid ";
  sum = 0;

  Serial.begin(9600);
  SPI.begin();       // Init SPI bus
  mfrc522.PCD_Init(); // Init MFRC522

  //lcd.clear();
  pinMode(8, OUTPUT); //red
  pinMode(9, OUTPUT); //yellow
  pinMode(10, OUTPUT); //green

Start:
  lcd.setCursor(0, 1);
  delay(2000);
  Serial.print("\nInput ");
  char key = 'x';
  while (key != 'D') {
    key = keypad.getKey();
    if (key != NO_KEY) {
      Serial.print(key);
      int am;
      switch (key) {
        case '0' : am = 0; break;
        case '1' : am = 1; break;
        case '2' : am = 2; break;
        case '3' : am = 3; break;
        case '4' : am = 4; break;
        case '5' : am = 5; break;
        case '6' : am = 6; break;
        case '7' : am = 7; break;
        case '8' : am = 8; break;
        case '9' : am = 9; break;

        case 'A' : goto Start; break;
        // case 'B' : sum = (sum-am)/100; am =0; break;

        case 'C' : sum = 0; am = 0; break;
        case 'D' : goto ending; break;

        default :   break;
      }

      lcd.print(am);
      sum = (sum * 10) + am;
    }
  }
ending:
  Serial.println();
  Serial.print("Pay =  ");
  Serial.println(sum);

  lcd.clear();
  lcd.print("Pay:");
  lcd.print(sum);
  lcd.print(" Taka");

  lcd.setCursor(0, 1);

  lcd.println("Swipe Card");
  delay(2000);
}
void loop() {


  /*if ( mfrc522.PICC_IsNewCardPresent())
      {
          if ( mfrc522.PICC_ReadCardSerial())
          {
             Serial.print("Tag UID:");
             for (byte i = 0; i < mfrc522.uid.size; i++) {
                    Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " ");
                    Serial.print(mfrc522.uid.uidByte[i], HEX);
              }

              Serial.println();
              mfrc522.PICC_HaltA();
          }
    }*/
  // Look for new cards
  if ( ! mfrc522.PICC_IsNewCardPresent())
  {
    Serial.println("card not found");
    return;
  }
  // Select one of the cards
  if ( ! mfrc522.PICC_ReadCardSerial())
  {
    return;
  }
  //Show UID on serial monitor
  lcd.clear();
  digitalWrite(8, LOW);
  digitalWrite(9, HIGH);
  digitalWrite(10, LOW);
  Serial.print("UID tag :");
  //lcd.print("UID tag :");
  lcd.print("Hellow");
  String content = "";
  byte letter;
  for (byte i = 0; i < mfrc522.uid.size; i++)
  {
    Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " ");
    Serial.print(mfrc522.uid.uidByte[i], HEX);
    content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " "));
    content.concat(String(mfrc522.uid.uidByte[i], HEX));
  }
  Serial.println();

  Serial.print("Message : ");
  content.toUpperCase();
  for (int i = 0; i < 5; i++) {
    if (content.substring(1) == user[i].cid) {
      userN = i;
      break;
    }
    else   {
      Serial.println(" Access denied");
    }
  }
  Serial.println("Authorized access");

  user[userN].amount -= sum;

  Serial.println(user[userN].Uname);
  Serial.print("Remaining Balance");
  Serial.println(user[userN].amount);

  lcd.setCursor(0, 1);
  //lcd.print(content);
  lcd.print(user[userN].Uname);
  delay(waiting);
  lcd.clear();
  lcdprnt = lcdprnt + sum;
  lcd.print(lcdprnt);
  lcd.print(" Tk");
  lcd.setCursor(0, 1);

StaticJsonDocument<1000> jsonBuffer;
  jsonBuffer["id"]=603;
  jsonBuffer["amount"]=sum;
  jsonBuffer["user"]=content.substring(1);
  jsonBuffer["platform"]=platform;
  
  serializeJsonPretty(jsonBuffer,Serial);
  Serial1.println();
  delay(1000);

  endPrint();
}

void endPrint() {
  digitalWrite(8, LOW);
  digitalWrite(9, LOW);
  digitalWrite(10, HIGH);

  delay(5000);
  lcd.clear();
  lcd.print("Thank You");
  myservo.write(0);
  printByte(arrow);
    Serial.println("Go Now");
  delay(5000);

  setup();

}
void printByte(byte character [])//for led print
{
  int i = 0;
  for (i = 0; i < 8; i++)
  {
    lc.setRow(0, i, character[i]); // this is for blank
  }
}
