import {
  setCookie,
  getCookie,
  getValueOfCookie,
  deleteCookie,
} from "./utils.js";

export const voteJoke = (idJoke, isLike) => {
  //kiem tra cookie co ton tai hay chua
  let cookieVoted = getCookie("voted");

  if (cookieVoted != null) {
    const votedJoke = {
      id: idJoke,
      isLike: isLike,
    };
    let valCookieVoted = JSON.parse(getValueOfCookie("voted")); //la 1 mang cac object

    valCookieVoted.forEach((element) => {
      if (element.id == idJoke) element.isLike = isLike;
      else valCookieVoted.push(votedJoke);
    });

    setCookie("voted", JSON.stringify(valCookieVoted), 7);
  } else {
    let voted = [];
    const votedJoke = {
      id: idJoke,
      isLike: isLike,
    };

    voted.push(votedJoke);

    setCookie("voted", JSON.stringify(voted), 7);
  }
};

window.voteJoke = voteJoke;
