#include <SPI.h>
#include <MFRC522.h>
#define SS_PIN 53
#define RST_PIN 49
int a_amount = 5000, b_amount = 5000, c_amount = 5000;

char A_card = "3F AD 4D 29";
char B_card = "BO 77 BB 25";
char C_card = "71 F3 3D 08";
MFRC522 mfrc522(SS_PIN, RST_PIN); // Instance of the class
void setup() {
   Serial.begin(9600);
   SPI.begin();       // Init SPI bus
   mfrc522.PCD_Init(); // Init MFRC522
   Serial.println("RFID reading UID");
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
    a_amount -=200;
    Serial.println(a_amount);
    delay(1000);
  }
  else if (content.substring(1) == "B0 77 BB 25" ) //change here the UID of the card/cards that you want to give access
  {
    Serial.println("Authorized access");
    b_amount -=300;
    Serial.println(b_amount);
    delay(1000);
  }
 /*else if (content.substring(1) == C_card) //change here the UID of the card/cards that you want to give access
  {
    Serial.println("Authorized access");
    c_amount -=200;
    Serial.println(c_amount);
    delay(1000);
  }*/
 else   {
    Serial.println(" Access denied");
    }
} 
