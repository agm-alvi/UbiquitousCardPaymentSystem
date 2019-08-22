#include<LiquidCrystal.h>
#include <Keypad.h>
#include<stdlib.h>
const int rs = 2, en = 3, d4 = 4, d5 = 5, d6 = 6, d7 = 7;
LiquidCrystal lcd(rs,en,d4,d5,d6,d7);
const byte ROWS = 4; //four rows
const byte COLS = 4; //three columns

char keys[ROWS][COLS] = {
  {'1','2','3','A'},
  {'4','5','6','B'},
  {'7','8','9','C'},
  {'*','0','#','D'}
};

byte rowPins[ROWS] = {23, 25, 27, 29}; //connect to the row pinouts of the keypad
byte colPins[COLS] = {31, 33, 35, 37}; //connect to the column pinouts of the keypad
int sum = 0;
Keypad keypad = Keypad( makeKeymap(keys), rowPins, colPins, ROWS, COLS );

//void please_pay(char amount[]);

//char amount[5] = {0,0,0,0,0};
void setup() {
  // put your setup code here, to run once:
  lcd.begin(16,2);
  
  lcd.print("Welcome");
  lcd.setCursor(0,1);
  lcd.print("Enter Amount");
  Serial.begin(9600);
  delay(2000);
 
}

void loop() {
 
  // put your main code here, to run repeatedly:
  
Start:
  lcd.clear();
 //please_pay();
lcd.print("Key Input");
  delay(2000);
  Serial.print("Key Input");
  char key = 'x';
  while(key!='D'){
     key = keypad.getKey();
  if (key != NO_KEY){
   // Serial.println(key);
    lcd.print(key);
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
      case 'C' : sum = 0; break;
      case 'D' : goto ending; break;
      
      default :   break;
    }
 
    
    Serial.print(am);
    sum = (sum*10)+ am;
    }
  }
  ending:
  Serial.print("Sum =  ");
Serial.print(sum);
delay(2000);
lcd.clear();
lcd.print("Please Pay:");
lcd.setCursor(0,1);
lcd.print(sum);


exit(0); 
 }
