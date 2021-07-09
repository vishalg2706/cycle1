// const userId = document.getElementById('Name');
const firstName = document.getElementById('Name');
const lastName = document.getElementById('Lastname');
const email = document.getElementById('email');
const mob = document.getElementById('mob');
const startBtn = document.getElementById('start');
const date = document.getElementById('GFG_DOWN');
// const removeBtn = document.getElementById('removeBtn'); 

const database = firebase.database();
const usersRef = database.ref('/users');

document.querySelector(".footsy").addEventListener("submit", startBtn);

startBtn.addEventListener('click', e => {
    e.preventDefault();
    const autoId = usersRef.push().key
    usersRef.child(autoId).set({

        first_name: Name.value,
        last_name: Lastname.value,
        email: email.value,
        mob: mob.value,
        date: GFG_DOWN.value,
        start: start.value,
    });
    $('#start').css("display", "none");
    location.reload();

});

   console.log(localStorage.getItem('mob', mob));



// usersRef.orderByChild("mob").limitToFirst(3).once('value',function(snapshot){
//     console.log(snapshot.val());
// });

// usersRef.orderByChild("mob").equalTo("9468676430").once('value',function(snapshot){
//     console.log(snapshot.val());
// });


// better
// usersRef.orderByValue().once('value',function(snapshot){
//     console.log(snapshot.val());  
// });


// usersRef.once('value', (snapshot) => {
//   snapshot.forEach((childSnapshot) => {
//     var childKey = childSnapshot.key;
//     var childData = childSnapshot.val();
//     // console.log(childData);
//     console.log(childData.mob , childData.date);
//     // ...
//   });
// });

// usersRef.orderByValue().on('child_added',function(snapshot){
//     console.log(snapshot.val());
// });