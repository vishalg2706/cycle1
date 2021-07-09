    var firebaseConfig = {
    apiKey: "AIzaSyC1HqEnGUqr_jSajSQdvNLZQI3uEBgIQdg",
    authDomain: "page-ff92f.firebaseapp.com",
    databaseURL: "https://page-ff92f-default-rtdb.firebaseio.com",
    projectId: "page-ff92f",
    storageBucket: "page-ff92f.appspot.com",
    messagingSenderId: "682816138612",
    appId: "1:682816138612:web:d2478ddedfc1451b169021",
    measurementId: "G-5MLPT0P9TS"
  };
  // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();

// var messagesRef = firebase.database().ref(' users');


//function to fetch Firebase RTDB data
// getData();  

// function getData() 
// {
//   firebase.database().ref('users').once('value', function (snapshot)
//   {	snapshot.forEach(function(childSnapshot)
//       {
//           var childKey = childSnapshot.key;
//           var childData = childSnapshot.val();


//           var table = document.getElementById("myTable");
//           var row = table.insertRow();   //insert a new  <tr> at postion 1 

//           //created 3 <td> in the current <td>
//           var cell1 = row.insertCell(0);   
//           var cell2 = row.insertCell(1);
//           var cell3 = row.insertCell(2);

//           // adding data  to the  row from databse 
//           cell1.innerHTML = childData['first_name'];
//           cell2.innerHTML = childData['last_name'];
//           cell3.innerHTML = childData['age'];  //here 'name' 'email' 'phone' are   keys from my database   =====>make sure to replace with yours 




//       })
//   })

// }  
function SelectAllData() {

    firebase.database().ref('users').on('value',
        function(AllRecords) {
            AllRecords.forEach(
                function(CurrentRecord) {
                    //   var userId = CurrentRecord.val().autoId;
                    var firstName = CurrentRecord.val().first_name;
                    var lastName = CurrentRecord.val().last_name;
                    var email = CurrentRecord.val().email;
                    var mob = CurrentRecord.val().mob;
                    var start = CurrentRecord.val().start;
                    var date = CurrentRecord.val().date;
                    AddItemsToTable(firstName, lastName, email, mob, start, date);        
                }
            );
        });
}
window.onload = SelectAllData();
  

//Filling the table
var stdNo = 0;
// var NUM = 0;

function AddItemsToTable(firstName, lastName, email, mob, start, date) {
    var tbody = document.getElementById('tbody1');
    var trow = document.createElement('tr');
    var td1 = document.createElement('td');
    var td2 = document.createElement('td');
    var td3 = document.createElement('td');
    var td4 = document.createElement('td');
    var td5 = document.createElement('td');
    var td6 = document.createElement('td');
    var td7 = document.createElement('td');

    td1.innerHTML = ++stdNo;
    // var NUM = stdNo ;
    // td2.innerHTML = userId;
    td2.innerHTML = firstName;
    td3.innerHTML = lastName;
    td4.innerHTML = email;
    td5.innerHTML = mob;
    td6.innerHTML = date;
    td7.innerHTML = start;

    trow.appendChild(td1);
    trow.appendChild(td2);
    trow.appendChild(td3);
    trow.appendChild(td4);
    trow.appendChild(td5);
    trow.appendChild(td6);
    trow.appendChild(td7);
    tbody.appendChild(trow);
    // NUM = ++NUM;
    
}
setTimeout(function(){
   window.location.reload(1);
}, 10000);



