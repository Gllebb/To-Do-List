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



// Todos
$(document).ready(function() {
    const todoInput = $(".todo-input");
    const todoList = $(".todo-list");
  
    $(document).on("click", ".todo-button", function(event) {
      event.preventDefault();
      const todoInputValue = todoInput.val().trim();
      if (todoInputValue !== "") {
        const todoDiv = $("<div>").addClass("todo");
        const newTodo = $("<li>").text(todoInputValue).addClass("todo-item");
        todoDiv.append(newTodo);
      
        saveLocalTodos(todoInputValue);
      
        const completedButton = $("<button>").html('<i class="fas fa-check-circle"></i>').addClass("complete-btn done");
        todoDiv.append(completedButton);
      
        const trashButton = $("<button>").html('<i class="fas fa-trash"></i>').addClass("trash-btn");
        todoDiv.append(trashButton);
      
        todoList.append(todoDiv);
        todoInput.val("");
      }
    });
    
  
    $(document).on("click", ".trash-btn", function(e) {
      const item = $(this);
  
      if (item.hasClass("trash-btn")) {
        const todo = item.parent();
        todo.addClass("slide");
  
        removeLocalTodos(todo);
        todo.on("transitionend", function() {
          todo.remove();
        });
      }
    });
  
    $(document).on("click", ".complete-btn", function(e) {
      const item = $(this);
  
      if (item.hasClass("complete-btn")) {
        const todo = item.parent();
        todo.toggleClass("completed");
      }
    });
  
    $(document).on("change", ".filter-todo", function(event) {
        const todos = todoList.children();
        todos.each(function() {
          if ($(event.target).val() === "all") {
            $(this).css("display", "flex");
          } else if ($(event.target).val() === "completed") {
            if ($(this).hasClass("completed")) {
              $(this).css("display", "flex");
            } else {
              $(this).css("display", "none");
            }
          } else if ($(event.target).val() === "incomplete") {
            if (!$(this).hasClass("completed")) {
              $(this).css("display", "flex");
            } else {
              $(this).css("display", "none");
            }
          }
        });
      });
      
  
    function saveLocalTodos(todo) {
      let todos = JSON.parse(localStorage.getItem("todos")) || [];
      todos.push(todo);
      localStorage.setItem("todos", JSON.stringify(todos));
    }
  
    function getLocalTodos() {
      let todos = JSON.parse(localStorage.getItem("todos")) || [];
      todos.forEach(function(todo) {
        const todoDiv = $("<div>").addClass("todo");
        const newTodo = $("<li>").text(todo).addClass("todo-item");
        todoDiv.append(newTodo);
  
        const completedButton = $("<button>")
          .html('<i class="fas fa-check-circle"></i>')
          .addClass("complete-btn");
        todoDiv.append(completedButton);
  
        const trashButton = $("<button>")
          .html('<i class="fas fa-trash"></i>')
          .addClass("trash-btn");
        todoDiv.append(trashButton);
  
        todoList.append(todoDiv);
      });
    }
  
    function removeLocalTodos(todo) {
      let todos = JSON.parse(localStorage.getItem("todos")) || [];
      const todoIndex = todo.children(".todo-item").text();
      todos.splice(todos.indexOf(todoIndex), 1);
      localStorage.setItem("todos", JSON.stringify(todos));
    }
  
    getLocalTodos();
});

const sound = new Audio("completed.mp3");
$(".create").click(function() {
  sound.play();
});