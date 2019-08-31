#include <SoftwareSerial.h>
#include <ArduinoJson.h>


#include <LiquidCrystal.h>
#include <Keypad.h>

#include <SPI.h>
#include <MFRC522.h>

#include<stdlib.h>
SoftwareSerial srl(22,23);//(RX,TX)

const byte ROWS = 4; //four rows
const byte COLS = 4; //four columns

char keys[ROWS][COLS] = {
  {'1','2','3','A'},
  {'4','5','6','B'},
  {'7','8','9','C'},
  {'*','0','#','D'}
};
byte rowPins[ROWS] = {25, 27, 29, 31}; //connect to the row pinouts of the keypad
byte colPins[COLS] = {33, 35, 37, 39}; //connect to the column pinouts of the keypad
Keypad keypad = Keypad( makeKeymap(keys), rowPins, colPins, ROWS, COLS );

const int rs = 2, en = 3, d4 = 4, d5 = 5, d6 = 6, d7 = 7;
LiquidCrystal lcd(rs,en,d4,d5,d6,d7);

#define SS_PIN 53 
#define RST_PIN 49 //For MFRC522
MFRC522 mfrc522(SS_PIN, RST_PIN); // Instance of the class

struct Info{
  int id;
  char cid[12];
  char Uname[20];
  int amount;
}user[5]= { {1, "3F AD 4D 29", "Jahid Hasan Alvi", 5000}, 
            {2, "BO 77 BB 25", "Ekhtear Uddin Khan", 3000},
            {3, "71 F3 3D 08", "Mubina Jerin", 2000},
            {4, "A1 F4 78 D5", "Zunayeed Bin Zahir", 10000},
            {5, "C1 7B E5 D5", "Sokhina ", 600}
};

//int a_amount = 5000, b_amount = 2000, c_amount = 300;
int waiting = 3000;
int sum = 0, userN;
String lcdprnt ;
void setup() {
    digitalWrite(8,HIGH);
    digitalWrite(9,LOW);
    digitalWrite(10,LOW);
    
  lcdprnt = "Paid "; 
  sum = 0;
  lcd.begin(16,2);
   Serial.begin(9600);
   SPI.begin();       // Init SPI bus
   mfrc522.PCD_Init(); // Init MFRC522
   lcd.print("Welcome to UCPS");
  delay(2000);
  lcd.clear();
  lcd.print("Enter Amount: ");
  Serial.begin(9600);
  
   //lcd.clear();
pinMode(8,OUTPUT);//red
pinMode(9,OUTPUT);//yellow
pinMode(10,OUTPUT);//green

Start:
  lcd.setCursor(0,1);
  delay(2000);
  Serial.print("Input ");
  char key = 'x';
  while(key!='D'){
     key = keypad.getKey();
  if (key != NO_KEY){
    Serial.print(key);
    int am;
       switch(key){
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
    sum = (sum*10)+ am;
    }
  }
ending:
Serial.println();
Serial.print("Sum =  ");
Serial.println(sum);

lcd.clear();
lcd.print("Pay:");
lcd.print(sum);
lcd.print(" Taka");

lcd.setCursor(0,1);

lcd.println("Swipe Card");
delay(2000);   
}
void loop() {
  // Look for new cards
  if ( ! mfrc522.PICC_IsNewCardPresent()) 
  {
    return;
  }
  // Select one of the cards
  if ( ! mfrc522.PICC_ReadCardSerial()) 
  {
    return;
  }
  //Show UID on serial monitor
  lcd.clear();
    digitalWrite(8,LOW);
    digitalWrite(9,HIGH);
    digitalWrite(10,LOW);
    Serial.print("UID tag :");
  //lcd.print("UID tag :");
  lcd.print("Hellow");
  String content= "";
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
  for(int i = 0; i<5; i++){
    if(content.substring(1) == user[i].cid) {userN = i;break;}
    else   {
    Serial.println(" Access denied");
    }
  }
  Serial.println("Authorized access");
    user[userN].amount -=sum;
    Serial.println(user[userN].amount);
  lcd.setCursor(0,1);
  //lcd.print(content);
  lcd.print(user[userN].Uname);
  delay(waiting);
  lcd.clear();
  lcdprnt = lcdprnt+sum;
  lcd.print(lcdprnt);
  lcd.print(" Tk");

   StaticJsonBuffer<1000> jsonBuffer;
   JsonObject& root = jsonBuffer.createObject();
   root["data1"] = user[userN].cid;
   root["data2"] = user[userN].Uname;
   root["data3"] = user[userN].amount;

lcd.setCursor(0,1);
  
   if (srl.available()>0)
   {lcd.print("Sent to Server");
   root.printTo(srl);
   }
   else 
   {lcd.print("server Timeout");}

  
  endPrint();  
 
}

void endPrint(){
    digitalWrite(8,LOW);
    digitalWrite(9,LOW);
    digitalWrite(10,HIGH);
    
delay(5000);
lcd.clear();
lcd.print("Thank You");
delay(5000);
setup();

}
 
