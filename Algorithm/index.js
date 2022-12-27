import {
  isHaveFiveElements,
  isPositiveInteger,
  quickSort,
  clearValueInput,
} from "./Utils.js";

export const validateInput = (input) => {
  let arrInput = [];
  let isHaveNotInteger = false;

  if (isHaveFiveElements(input)) {
    //chuyển đổi các phần tử từ string sang number
    arrInput = input.split(" ").map((element) => +element);
    arrInput.forEach((element) => {
      if (!isPositiveInteger(element)) {
        isHaveNotInteger = true;
      }
    });

    if (isHaveNotInteger) {
      alert("Vui lòng chỉ nhập số nguyên dương !");
      clearValueInput("result");
    } else {
      miniMaxSum(arrInput);
    }
  } else {
    alert("Vui lòng chỉ nhập 5 phần tử !");
    clearValueInput("result");
  }
};

export const miniMaxSum = (arr) => {
  let arrAsc = [];
  let minimum = 0;
  let maximum = 0;

  arrAsc = quickSort(arr);

  // lấy 4 phần tử bé nhất đầu mảng
  for (let i = 0; i < 4; i++) {
    minimum += arrAsc[i];
  }
  //lấy 4 phần tử lớn nhất cuối mảng
  for (let i = arrAsc.length - 1; i >= 1; i--) {
    maximum += arrAsc[i];
  }

  document.getElementById("result").value = minimum + " " + maximum;
};

//khai báo biến toàn cục để sử dụng cho hàm onlick của button
window.validateInput = validateInput;
