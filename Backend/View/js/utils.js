export const setCookie = (name, value, expiryDays, path = "/") => {
  const date = new Date();
  let expires = "";

  date.setTime(date.getTime() + expiryDays * 24 * 60 * 60 * 1000);
  expires = "expires=" + date.toUTCString();

  document.cookie = name + "=" + value + ";" + expires + ";path=" + path;
};

export const getCookie = (cookieName) => {
  const cookies = document.cookie.split(";");

  for (let item of cookies) {
    if (item.indexOf(cookieName) !== -1) return item;
  }

  return null;
};

export const getValueOfCookie = (cookieName) => {
  if (cookieName == null) return null;

  const cookie = getCookie(cookieName);

  return cookie.substring(cookie.indexOf("=") + 1);
};

export const deleteCookie = (cookieName) => {
  document.cookie =
    cookieName + "=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;";
};
