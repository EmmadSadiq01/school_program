// function staff1(value) {
//   // console.log(value)
//   staff_salary(value)
// }
function staff_salary(id) {
  // console.log(id)
  // console.log(id)
  // console.log(id)
  $.ajax({
    url: "basic_salary_ajax.php",
    type: "POST",
    data: {
      staff: id
    },
    success: function (staff_salary) {
      $('#basic_salary').val(staff_salary)
      // console.log(staff_salary)
      absent_days()
      cal_allowance()
    }
  })
  // console.log(id)
}
function absent_days(){
  let salary = $('#basic_salary').val();
  let absent = $('#absent').val();
  let deduction =Math.round((salary/30)*absent)
  $('#deduction').val(deduction)
  cal_allowance()

}
function cal_allowance(){
  let salary = $('#basic_salary').val();
  let deduction = $('#deduction').val();
  let allo = $('#allowance').val();
  console.log("sallary=>"+salary+"deduction=>"+deduction +"allowance=>"+allo)
  let total = parseInt(salary)+ parseInt(allo)-parseInt(deduction)
  $('#total').val(total)

  
}