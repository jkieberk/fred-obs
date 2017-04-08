<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <title></title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"
      <!-- Optional theme -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <link rel="stylesheet" type="text/css" href="create.css" media="screen" />
      <script>
      $("#sortable").sortable();
      $("#sortable").disableSelection();

      countTodos();

      // all done btn
      $("#checkAll").click(function(){
          AllDone();
      });

      //create todo
      $('.add-todo').on('keypress',function (e) {
            e.preventDefault
            if (e.which == 13) {
                 if($(this).val() != ''){
                 var todo = $(this).val();
                  createTodo(todo);
                  countTodos();
                 }else{
                     // some validation
                 }
            }
      });
      // mark task as done
      $('.todolist').on('change','#sortable li input[type="checkbox"]',function(){
          if($(this).prop('checked')){
              var doneItem = $(this).parent().parent().find('label').text();
              $(this).parent().parent().parent().addClass('remove');
              done(doneItem);
              countTodos();
          }
      });

      //delete done task from "already done"
      $('.todolist').on('click','.remove-item',function(){
          removeItem(this);
      });

      // count tasks
      function countTodos(){
          var count = $("#sortable li").length;
          $('.count-todos').html(count);
      }

      //create task
      function createTodo(text){
          var markup = '<li class="ui-state-default"><div class="checkbox"><label><input type="checkbox" value="" />'+ text +'</label></div></li>';
          $('#sortable').append(markup);
          $('.add-todo').val('');
      }

      //mark task as done
      function done(doneItem){
          var done = doneItem;
          var markup = '<li>'+ done +'<button class="btn btn-default btn-xs pull-right  remove-item"><span class="glyphicon glyphicon-remove"></span></button></li>';
          $('#done-items').append(markup);
          $('.remove').remove();
      }

      //mark all tasks as done
      function AllDone(){
          var myArray = [];

          $('#sortable li').each( function() {
               myArray.push($(this).text());
          });

          // add to done
          for (i = 0; i < myArray.length; i++) {
              $('#done-items').append('<li>' + myArray[i] + '<button class="btn btn-default btn-xs pull-right  remove-item"><span class="glyphicon glyphicon-remove"></span></button></li>');
          }

          // myArray
          $('#sortable li').remove();
          countTodos();
      }

      //remove done task from list
      function removeItem(element){
          $(element).parent().remove();
      }
      </script>

    </head>
  <body>
      <div class="container">
      <div class="row">
          <div class="col-md-6">
              <div class="todolist not-done">
               <h1>Todos</h1>
                  <input type="text" class="form-control add-todo" placeholder="Add todo">
                      <button id="checkAll" class="btn btn-success">Mark all as done</button>

                      <hr>
                      <ul id="sortable" class="list-unstyled">
                      <li class="ui-state-default">
                          <div class="checkbox">
                              <label>
                                  <input type="checkbox" value="" />Take out the trash</label>
                          </div>
                      </li>
                      <li class="ui-state-default">
                          <div class="checkbox">
                              <label>
                                  <input type="checkbox" value="" />Buy bread</label>
                          </div>
                      </li>
                      <li class="ui-state-default">
                          <div class="checkbox">
                              <label>
                                  <input type="checkbox" value="" />Teach penguins to fly</label>
                          </div>
                      </li>
                  </ul>
                  <div class="todo-footer">
                      <strong><span class="count-todos"></span></strong> Items Left
                  </div>
              </div>
          </div>
          <div class="col-md-6">
              <div class="todolist">
               <h1>Already Done</h1>
                  <ul id="done-items" class="list-unstyled">
                      <li>Some item <button class="remove-item btn btn-default btn-xs pull-right"><span class="glyphicon glyphicon-remove"></span></button></li>

                  </ul>
              </div>
          </div>
      </div>
    </div>
  </body>
  <style media="screen">
  body{
  background-color:#EEEEEE;
}
.todolist{
  background-color:#FFF;
  padding:20px 20px 10px 20px;
  margin-top:30px;
}
.todolist h1{
  margin:0;
  padding-bottom:20px;
  text-align:center;
}
.form-control{
  border-radius:0;
}
li.ui-state-default{
  background:#fff;
  border:none;
  border-bottom:1px solid #ddd;
}

li.ui-state-default:last-child{
  border-bottom:none;
}

.todo-footer{
  background-color:#F4FCE8;
  margin:0 -20px -10px -20px;
  padding: 10px 20px;
}
#done-items li{
  padding:10px 0;
  border-bottom:1px solid #ddd;
  text-decoration:line-through;
}
#done-items li:last-child{
  border-bottom:none;
}
#checkAll{
  margin-top:10px;
}
  </style>

</html>
