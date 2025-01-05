const chatInput = document.querySelector(".prompt-form textarea");
const sendChatBtn = document.querySelector(".prompt-form i");
const chatbox = document.querySelector(".chatbox");


const card1click = document.querySelector(".card1");
const card2click = document.querySelector(".card2");
const card3click = document.querySelector(".card3");
const card4click = document.querySelector(".card4");

const API_KEY = "AIzaSyDUuRbV9oYv4hAtBHz0HoCKSaS_MPrEmSA";


let userMessage;

function updateScroll(){
    var element = document.getElementById("#mainContentDiv");
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
    const API_URL = `http://127.0.0.1:5000/message`;

    const messageElement = incomingChatLi.querySelector("p");

    const requestOptions = {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ 
            user_id: "unique_user_id", // Replace with dynamic user ID if available
            message: userMessage 
        }),
    };

    fetch('/GPT/LETSGOOOOOOOOOOOOOOOOOOO/Test2/Main.php', requestOptions)
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        console.log("AI Response:", data); // Debug the AI response
        messageElement.textContent = data.response; // Display AI response
    })
    .catch(error => {
        console.error("Fetch error:", error); // Log fetch errors
        messageElement.textContent = "Oops, something went wrong....";
    });

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
    handleChat;
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