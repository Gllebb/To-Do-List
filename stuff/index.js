$(function() {
  let today = new Date();
    let year = today.getFullYear();
    let month = today.getMonth() + 1;
    let day = today.getDate();
    if(day < 10){
      day = "0" + day;
    };
    if(month < 10) {
      month = "0" + month;
    };
    $("#current-date").text(day + "." + month + "." + year);
});

$(function() {
  function updateTime() {
    let today = new Date();
    let hours = today.getHours();
    let minutes = today.getMinutes();
    let seconds = today.getSeconds();
    if(hours < 10){
        hours = "0" + hours;
      }
    if(minutes < 10){
      minutes = "0" + minutes;
    }
    if(seconds < 10) {
      seconds = "0" + seconds;
    }
    $('#current-time').text(hours + ":" + minutes + ":" + seconds);
  }

  setInterval(updateTime, 1000);
});

$('.dropdown-menu li').click(function() {
  const selectedColor = $(this).data('color');
  $('body').css('background-color', selectedColor);
});
  
// Quotes
const quoteText = $(".quote");
const quoteBtn = $("#newQuote");
const authorName = $(".author");

quoteBtn.on("click", function() {
  quoteBtn.text("Loading Quote...");
  $.getJSON("http://api.quotable.io/random", function(result) {
    quoteText.text(result.content);
    authorName.text(result.author);
    quoteBtn.removeClass("loading");
    quoteBtn.text("New Quote");
  });
});

// browsers
let userAgent = navigator.userAgent;
let browser;
if (userAgent.match(/edge/i)) {
  browser = "edge";
} else if (userAgent.match(/firefox/i)) {
  browser = "firefox";
} else if (userAgent.match(/opr\//i)) {
  browser = "opera";
} else if (userAgent.match(/chrome|/i)) {
  browser = "chrome";
} else if (userAgent.match(/safari/i)) {
  browser = "safari";
} else {
  alert("Other browser");
}
const logo = $(`.logos .${browser}`);
if (logo.length) {
  logo.css("opacity", "1");
}
