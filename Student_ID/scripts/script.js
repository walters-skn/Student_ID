window.onload=function(){
    var submit = document.getElementById('submit');
    submit.onclick= validateForm;

    function validateForm(){
    var clerk = document.getElementById('clerk');
    var constituency = document.getElementById('constituency');
    var polldiv = document.getElementById('polldiv');
    var pollname = document.getElementById('pollname');
    var can1 = document.getElementById('can1');
    var can2 = document.getElementById('can2');
    var reject = document.getElementById('reject');
    var total = document.getElementById("totalv");
    var pattern =/^[A-Z,0-9]+$/;

    document.getElementById('submit').addEventListener('click', function(e) {
        e.preventDefault();

        let tot = parseInt(can1.value) + parseInt(can2.value) + parseInt(reject.value);
        
        if (clerk.value == '' || isNaN(clerk.value)){
            clerk.style.borderColor="red";
            console.log("Clerk ID is required");
        }else{
            console.log("Clerk ID is Valid");
        }

        if (constituency.value == '' || isNaN(constituency.value)){
            constituency.style.borderColor = "red";
            console.log("Consitutency ID is Invalid");
        }else{
            console.log("Consitutency ID is Valid");
        }

        if (polldiv.value == '' || isNaN(polldiv.value)){
            polldiv.style.borderColor = "red";
            console.log("Polling Division ID is Invalid");
        }else{
            console.log("Polling Division is Valid");
        }

        if (pollname.value == '' || !isNaN(pollname.value.match(pattern))){
            pollname.style.borderColor = "red";
            console.log("Polling Station is Invalid");
        }else{
            console.log("Polling Station is valid");
        }

        if (can1.value == ''|| isNaN(can1.value)){
            can1.style.borderColor = "red";
            console.log("Candidate 1 Votes is Invalid");
        }else{
            console.log("Candidate 1 Votes is Valid");
        }

        if (can2.value == ''|| isNaN(can2.value)){
            can2.style.borderColor = "red";
            console.log("Candidate 2 Votes is Invalid");
        }else{
            console.log("Candidate 2 Votes is Valid");
        }
        
        if (reject.value == '' || isNaN(reject.value)){
            reject.style.borderColor = "red";
            console.log("Rejected Votes is Invalid");
        }else{
            console.log("Rejected Votes is Valid");
        }

        if (total.value === "" || isNaN(total.value) || parseInt(total.value)!== tot){
            total.style.borderColor = "red";
            console.log("Total Votes is Invalid");
        }else{
            console.log("Total Votes is Valid");
        }

    });
}
}

