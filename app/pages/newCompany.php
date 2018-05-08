<div class="portfolio-new">
  <form id="login_form" class="container box-shadow">
    <div >
      <h1> Client Info </h1>
      <div class="item">
        Company Name:
        <input name="company_name" class="form-control" />
      </div>
      <div class="item">
        <h3>Client Address:</h3>
        Street:
        <input name="street" class="form-control" />
        <div class="city-state-zip">
          <div class="city-item">
            City:
            <input name="city" class="form-control" />
          </div>
          <div class="city-item">
            State:
            <input name="state" class="form-control" />
          </div>
          <div class="city-item">
            Zip:
            <input name="zip" class="form-control" />
          </div>
        </div>
      </div>
      <div class="item">
        Client Status:
        <select name="status">
          <option value="volvo">Volvo</option>
          <option value="saab">Saab</option>
          <option value="mercedes">Mercedes</option>
          <option value="audi">Audi</option>
        </select>
      </div>
  </div>
  <div class="create">
    <button id="submit" type="submit" class="btn btn-success"> Create </button>
  </div>

  </form>
</div>

<script>
  $('#login_form').on('submit', function(e) { //use on if jQuery 1.7+
        e.preventDefault();  //prevent form from submitting
        var data = $("#login_form :input").serializeArray();
        console.log(data); //use the console for debugging, F12 in Chrome, not alerts
    });
</script>
