const searchBar = document.querySelector('.search');
const usersList = document.querySelector('.userList');
const dropDownButton = document.querySelector(".dropDownButton")
const input = document.querySelector(".userId")
const userEmail = document.querySelector(".userEmail")
const bookingsList = document.querySelector(".bookings");


const getOwnerID = (id,email)=>{
input.value = id;
userEmail.value = email;
dropDownButton.innerHTML = email
}

searchBar.onkeyup=()=>{
    let searchTerm = searchBar.value;

    //let's start ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../../digitalparking/assets/php/search.php",true);
    xhr.onload=()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                usersList.innerHTML = data;
            }
        }
    }

    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}



setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET" ,"../../digitalparking/assets/php/manageExpiration.php",true )
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
            }
        }
    }
    xhr.send();
},1000);

//get live bookings Data

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET" ,"../../digitalparking/assets/php/liveBookingData.php",true)
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                bookingsList.innerHTML = data;
            }
        }
    }
    xhr.send();
},100);