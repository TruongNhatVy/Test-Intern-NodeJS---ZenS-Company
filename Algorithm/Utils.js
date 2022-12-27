export const isHaveFiveElements = (input) => {
  const whiteSpace = input.split(" ").length - 1;

  if (whiteSpace == 4) return true;

  return false;
};
export const isPositiveInteger = (number) => {
  const num = Number(number);

  if (Number.isInteger(num) && num >= 0) {
    return true;
  }

  return false;
};
export const quickSort = (arr) => {
  if (arr.length < 2) return arr;

  //lấy phần tử cuối của 'arr' làm 'pivot'
  const pivotIndex = arr.length - 1;
  const pivot = arr[pivotIndex];

  const left = [];
  const right = [];

  let currentItem;
  //i < pivotIndex' => chúng ta sẽ không loop qua 'pivot' nữa
  for (let i = 0; i < pivotIndex; i++) {
    currentItem = arr[i];

    if (currentItem < pivot) {
      left.push(currentItem);
    } else {
      right.push(currentItem);
    }
  }

  return [...quickSort(left), pivot, ...quickSort(right)];
};
export const clearValueInput = (id) =>{
    document.getElementById(id).value = '';
}
