const chatInput = document.querySelector(".prompt-form textarea");
const sendChatBtn = document.querySelector(".prompt-form i");
const chatbox = document.querySelector(".chatbox");


const card1click = document.querySelector(".card1");
const card2click = document.querySelector(".card2");
const card3click = document.querySelector(".card3");
const card4click = document.querySelector(".card4");

const API_KEY = "AIzaSyCc7ZQI2bNC0rydGg0zmMOOeqrjnU9APd0";


let userMessage;

function updateScroll(){
    var element = document.getElementById("mainContentDiv");
    element.scrollTop = element.scrollHeight;
}

const createChatLi = (message, className) => {
    const chatLi = document.createElement("li");
    chatLi.classList.add("chat", className);
    let chatContent = className === "outgoing" ? `<p>${message}</p>` : `<p id="app">${message}</p>`;
    chatLi.innerHTML = chatContent;
    return chatLi;
}

const generateResponse = (incomingChatLi) => {
    const API_URL = "http://localhost:8080/generate-response";
  
    const messageElement = incomingChatLi.querySelector("p");
  
    const requestOptions = {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ userMessage }),
    };
  
    fetch(API_URL, requestOptions)
      .then((res) => {
        if (!res.ok) {
          throw new Error(`HTTP error! status: ${res.status}`);
        }
        return res.json();
      })
      .then((data) => {
        messageElement.textContent = data.response || "No response received.";
      })
      .catch((error) => {
        console.error("Error:", error);
        messageElement.textContent = "Oops, something went wrong.";
      })
      .finally(() => chatbox.scrollTo(0, chatbox.scrollHeight));
  };


const handleChat = () =>{
    if(!userMessage) return;

    chatbox.appendChild(createChatLi(userMessage, "outgoing"));
    chatInput.value="";
    chatbox.scrollTo(0, chatbox.scrollHeight);

    setTimeout(()=>{
        const incomingChatLi = createChatLi(`<i class="bx bxs-circle"></i><i class="bx bxs-circle"></i><i class="bx bxs-circle"></i>`, "incoming") 
        chatbox.appendChild(incomingChatLi);
        chatbox.scrollTo(0, chatbox.scrollHeight);
        generateResponse(incomingChatLi);
        updateScroll();
    }, 600)
}


sendChatBtn.addEventListener("click", ()=>{
    userMessage = chatInput.value.trim();
    handleChat();
});
chatInput.addEventListener("keypress", function(e){
    if (e.key === 'Enter'){
        if(e.shiftKey){
            return;
        }
        e.preventDefault();
        userMessage = chatInput.value.trim();
        handleChat();
    }
});

card1click.addEventListener("click", () => {
    userMessage = "Good places to get pizza from in Patiala.";
    handleChat();
});

card2click.addEventListener("click", () => {
    userMessage = "Give the syllabus of Mathematics-II.";
    handleChat();
});

card3click.addEventListener("click", () => {
    userMessage = "What are some notable tech societies at TIET?";
    handleChat();
});

card4click.addEventListener("click", () => {
    userMessage = "Suggest some good places to hangout in Patiala.";
    handleChat();
});
console.log("API URL:", API_URL);
console.log("Request Payload:", requestOptions);
