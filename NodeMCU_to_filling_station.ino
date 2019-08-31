#include <SoftwareSerial.h>
#include <ArduinoJson.h>

#include <ESP8266WiFi.h>
#include <WiFiClient.h> 
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>

SoftwareSerial srl(D6,D5);//(RX,TX);
int Led_OnBoard = 2;                  // Initialize the Led_OnBoard 

const char* ssid = "OnePlus 6";                  // Your wifi Name       
const char* password = "12345789";          // Your wifi Password

const char *host = "192.168.43.68"; //Your pc or server (database) IP, example : 192.168.0.0 , if you are a windows os user, open cmd, then type ipconfig then look at IPv4 Address.

void setup() {
  // put your setup code here, to run once:
  delay(1000);
  pinMode(Led_OnBoard, OUTPUT);       // Initialize the Led_OnBoard pin as an output
  Serial.begin(9600);
  srl.begin(9600);
  WiFi.mode(WIFI_OFF);        //Prevents reconnection issue (taking too long to connect)
  delay(1000);
  WiFi.mode(WIFI_STA);        //This line hides the viewing of ESP as wifi hotspot
  
  WiFi.begin(ssid, password);     //Connect to your WiFi router
  Serial.println("");

  Serial.print("Connecting");
  // Wait for connection
  while (WiFi.status() != WL_CONNECTED) {
    digitalWrite(Led_OnBoard, LOW);
    delay(250);
    Serial.print(".");
    digitalWrite(Led_OnBoard, HIGH);
    delay(250);
  }

  digitalWrite(Led_OnBoard, HIGH);
  //If connection successful show IP address in serial monitor
  Serial.println("");
  Serial.println("Connected to Network/SSID");
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());  //IP address assigned to your ESP
  while (!Serial) continue;
}

void loop() {
  // put your main code here, to run repeatedly:
  HTTPClient http;    //Declare object of class HTTPClient
 
  String  postData;
  String idValue,  amountValue;
  const char*  u_name;
  const char* u_id;
  int amount;
  StaticJsonBuffer<1000> jsonBuffer;
  JsonObject& root = jsonBuffer.parseObject(srl);
  if (root == JsonObject::invalid())
    return;
 //Data from Serial Port
  Serial.println("JSON received and parsed");
  root.prettyPrintTo(Serial);
  Serial.print("Data 1 ");
  Serial.println("");
  u_id=root["data1"];
  Serial.print(u_id);
  Serial.print("   Data 2 ");
  u_name=root["data2"];
  Serial.print(u_name);
  Serial.print("   Data 3 ");
  amount=root["data3"];
  Serial.print(amount);
  
  /*
  u_name = "Alvi";
  u_id = "3F AD 4D 29";
  amount = 350;
  */
   int id = 2;
  idValue = String(id);
  amountValue = String(amount);
  //Post Data
  postData = "id=" +idValue+ "&u_id="+u_id+ "&u_name="+u_name+ "&amount"+amount;
  
  http.begin("http://192.168.43.68/UbiquitousCardPayment/insert_Filling-station.php");              //Specify request destination
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header
 
  int httpCode = http.POST(postData);   //Send the request
  String payload = http.getString();    //Get the response payload

  //Serial.println("LDR Value=" + ldrvalue);
  Serial.print("httpcode ");
  Serial.println(httpCode);   //Print HTTP return code
  Serial.println("payload ");
  Serial.println(payload);    //Print request response payload
 
  Serial.println(postData);
  http.end();  //Close connection

  delay(4000);  //Here there is 4 seconds delay plus 1 second delay below, so Post Data at every 5 seconds
  digitalWrite(Led_OnBoard, LOW);
  delay(1000);
  digitalWrite(Led_OnBoard, HIGH);
}
