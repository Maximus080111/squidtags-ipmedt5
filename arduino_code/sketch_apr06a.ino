
#include <Keypad.h>
#include <SPI.h>
#include <MFRC522.h>
String code;
String rfidcode;
int scanned;
int ledGreen = 4;
int ledRed = 5;
int piezoPin = 7;
constexpr uint8_t RST_PIN = 9;
constexpr uint8_t SS_PIN = 11;
MFRC522 mfrc522(SS_PIN, RST_PIN);

void setup(){
  pinMode(ledGreen, OUTPUT);
  pinMode(ledRed, OUTPUT);
  Serial.begin(9600);
  SPI.begin();      // Init SPI bus
  mfrc522.PCD_Init();   // Init MFRC522
  digitalWrite(ledRed, HIGH);
}

void readHex(byte *buffer, byte bufferSize) {
  for (byte i = 0; i < bufferSize; i++) {
    Serial.print(buffer[i] < 0x10 ? " 0" : " ");
    Serial.print(buffer[i], HEX);
  }
}
  
void loop(){
  // Look for new cards
  if ( ! mfrc522.PICC_IsNewCardPresent()) { 
    return;
  }

    // Select one of the cards
  if ( ! mfrc522.PICC_ReadCardSerial()) {
    return;
  }

  //Serial.print("RFID UID: ");
  Serial.print("rfid-checkin.");
  readHex(mfrc522.uid.uidByte, mfrc522.uid.size);
  Serial.print(".4");
  Serial.println();
  //Serial.println(rfidcode);
  tone(piezoPin, 1000, 1200);
  delay(100);
  tone(piezoPin, 1500, 500);
  digitalWrite(ledRed, LOW);
  digitalWrite(ledGreen, HIGH);
  delay(3000);
  digitalWrite(ledRed, HIGH);
  digitalWrite(ledGreen, LOW);
  delay(3000);
}
