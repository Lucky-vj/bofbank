function check_function()
{
  var username=document.getElementById('username').value.trim();
  var cards=document.getElementById('card').value.trim();
  var number=document.getElementById('number').value.trim();

  if(username=="" && card=="" && number=="")
  {
    alert('not enetere checked');
  }
  else if (username=="") {
    alert('Username is must Required');

  }
  else if (cards) {
    alert('Crad input must Required');
  }
  else if (number) {
    alert('number is required');

  }
  else if (username.length<=16) {
alert('')
  }
}
