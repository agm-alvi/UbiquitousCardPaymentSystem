#include <SPI.h>
#include <MFRC522.h>
#include <LiquidCrystal.h>
#define SS_PIN 53
#define RST_PIN 49
const int rs = 2, en = 3, d4 = 4, d5 = 5, d6 = 6, d7 = 7;
LiquidCrystal lcd(rs,en,d4,d5,d6,d7);

int a_amount = 5000, b_amount = 5000, c_amount = 5000;
int amount = 0;
char A_card = "3F AD 4D 29";
char B_card = "BO 77 BB 25";
char C_card = "71 F3 3D 08";
MFRC522 mfrc522(SS_PIN, RST_PIN); // Instance of the class
void setup() {
   Serial.begin(9600);
   SPI.begin();       // Init SPI bus
   mfrc522.PCD_Init(); // Init MFRC522
   Serial.println("RFID reading UID");
   lcd.println("Welcome");
   delay(2000);
   lcd.clear();
   lcd.println("Swipe Card");
pinMode(8,OUTPUT);//5 volt
   
pinMode(23,INPUT);//100
pinMode(25,INPUT);//200
pinMode(27,INPUT);//300
pinMode(29,INPUT);//400
pinMode(31,INPUT);//500
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
digitalWrite(8,HIGH);
if(digitalRead(23) == HIGH) amount = 100;
else if (digitalRead(25) == HIGH) amount = 200;

else if (digitalRead(27) == HIGH) amount = 300;

else if (digitalRead(29) == HIGH) amount = 400;

else if (digitalRead(31) == HIGH) amount = 500;
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
  Serial.print("UID tag :");
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
  if (content.substring(1) == "3F AD 4D 29") //change here the UID of the card/cards that you want to give access
  {
    Serial.println("Authorized access");
    a_amount -=amount;
    Serial.println(a_amount);
    delay(1000);
  }
  else if (content.substring(1) == "B0 77 BB 25" ) //change here the UID of the card/cards that you want to give access
  {
    Serial.println("Authorized access");
    b_amount -=amount;
    Serial.println(b_amount);
    delay(1000);
  }
 else if (content.substring(1) == "71 F3 3D 08") //change here the UID of the card/cards that you want to give access
  {
    Serial.println("Authorized access");
    c_amount -=amount;
    Serial.println(c_amount);
    delay(1000);
  }
 else   {
    Serial.println(" Access denied");
    }
} 
