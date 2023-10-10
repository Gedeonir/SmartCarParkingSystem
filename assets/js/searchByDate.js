const fromDate = document.querySelector("#from");
const toDate = document.querySelector("#to");
const filtered = document.querySelector(".filtered");
const bookings = document.querySelector(".bookings");
const fromDatePayement = document.querySelector(".fromPayement");
const toDatePayement = document.querySelector(".toPayement");
const filteredPayement = document.querySelector(".filteredPayements");
const payements = document.querySelector(".payements");

searchByDate=()=>{
    let startDate = fromDate.value;
    let endDate = toDate.value;
    bookings.style.display="none";

    if(!startDate || !endDate){
        alert("all fields are required");
    }else{
        //let's start ajax
        let xhr = new XMLHttpRequest();
        xhr.open("POST","../../digitalparking/assets/php/searchByDate.php",true);
        xhr.onload=()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    filtered.innerHTML=data;
                }
            }
        }

        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhr.send("startDate=" + startDate +"&" + "endDate=" + endDate);
    }
    
}

searchByDatePayement=()=>{
    let startDate = fromDatePayement.value;
    let endDate = toDatePayement.value;
    payements.style.display="none";

    if(!startDate || !endDate){
        alert("all fields are required");
    }else{
        //let's start ajax
        let xhr = new XMLHttpRequest();
        xhr.open("POST","../../digitalparking/assets/php/searchByDatePayement.php",true);
        xhr.onload=()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    filteredPayement.innerHTML=data;
                }
            }
        }

        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhr.send("startDate=" + startDate +"&" + "endDate=" + endDate);
    }
    
}

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET" ,"../../digitalparking/assets/php/payements.php",true)
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                payements.innerHTML = data;
            }
        }
    }
    xhr.send();
},100);




