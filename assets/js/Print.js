function printBookingPage(){
    document.querySelector('.timePrinted').innerHTML = "Printed at:" + new Date().toLocaleString('en-US', { timeZone: 'Africa/Kigali' });
    const printContent = document.querySelector('.printableArea').innerHTML;
    const originalContent = document.body.innerHTML;
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
    document.querySelector('.timePrinted').innerHTML = "";
    
}