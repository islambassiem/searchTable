$(document).ready(function(){
let course = document.getElementById("course");
let section = document.getElementById("section");
let room = document.getElementById("room");
let seat = document.getElementById("seat");



  course.addEventListener("change", () => {
    $.ajax({
      url: 'search.php',
      method: 'POST',
      data: {
        course: course.value,
        sec: section.value,
        room: room.valuel,
        seat: seat.value,
      },
      success: function(result) {
        data.innerHTML = result;
      } 
    });
  });


  section.addEventListener("change", () => {
    $.ajax({
      url: 'search.php',
      method: 'POST',
      data: {
        course: course.value,
        sec: section.value,
        room: room.value,
        seat: seat.value,
      },
      success: function(result) {
        data.innerHTML = result;
      } 
    });
  });

  room.addEventListener("change", () => {
    $.ajax({
      url: 'search.php',
      method: 'POST',
      data: {
        course: course.value,
        sec: section.value,
        room: room.value,
        seat: seat.value,
      },
      success: function(result) {
        data.innerHTML = result;
      } 
    });
  })


  seat.addEventListener("change", () => {
    $.ajax({
      url: 'search.php',
      method: 'POST',
      data: {
        course: course.value,
        sec: section.value,
        room: room.value,
        seat: seat.value,
      },
      success: function(result) {
        data.innerHTML = result;
      } 
    });
  })

});