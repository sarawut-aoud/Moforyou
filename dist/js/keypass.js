function bannedKey(evt) {
  var allowedEng = true; //อนุญาตให้คีย์อังกฤษ
  var allowedThai = false; //อนุญาตให้คีย์ไทย
  var allowedNum = true; //อนุญาตให้คีย์ตัวเลข
  var k = event.keyCode; /* เช็คตัวเลข 0-9 */
  if (k >= 48 && k <= 57) {
    return allowedNum;
  }

  /* เช็คคีย์อังกฤษ a-z, A-Z */
  if ((k >= 65 && k <= 90) || (k >= 97 && k <= 122)) {
    return allowedEng;
  }

  /* เช็คคีย์ไทย ทั้งแบบ non-unicode และ unicode */
  if ((k >= 161 && k <= 255) || (k >= 3585 && k <= 3675)) {
    return allowedThai;
  }
}
