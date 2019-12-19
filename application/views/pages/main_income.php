<div class="main-form">
  <h1>Manage Your Income</h1>
  
  <form method="POST" action="http://students.stevens.edu/cne/main/manage_income" accept-charset="utf-8">
 <!--
  <form method="POST" accept-charset="utf-8">
  -->

    <div class="row">
        <div class="col-25">
          <label for="incomeType">Income Type</label>
        </div>
        <div class="col-75">
          <div id="incomeTypeSelection">
            <input type="radio" name="incomeType" value="fixed" checked>Fixed
            <input type="radio" name="incomeType" value="variable">Variable  
          </div>
        </div>
      </div>

    <div class="row">
      <div class="col-25">
        <label for="incomeSource">Source of Income</label>
      </div>
      <div class="col-75" id="incomeSource">
        <select name="incomeSource">
          <option value="fixedAllowance">Allowance</option>
          <option value="fixedWages">Wages</option>
          <option value="variableSideJob">Side Job</option>
          <option value="variableSelling">Selling</option>
          <option value="variableTrading">Trading</option>
          <option value="variableOther">Other</option>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="incomeFrequency">Frequency</label>
      </div>
      <div class="col-75">
        <select id="incomeFrequency" name="incomeFrequency">
          <option value="weekly">Weekly</option>
          <option value="biWeekly">Bi-weekly</option>
          <option value="monthly">Monthly</option>
          <option value="annual">Annual</option>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="incomeStartingDate">Starting Date</label>
      </div>
      <div class="col-75">
        <input type="date" name="incomeStartingDate" placeholder="1/1/2019">
      </div>
    </div>    

    <div class="row">
      <div class="col-25">
        <label for="incomeAmount">Amount</label>
      </div>
      <div class="col-75">
        <input type="number" name="incomeAmount" placeholder="$">
      </div>
    </div>

    <div class="row">
        <input type="submit" value="Submit">
    </div>
  </form>
</div>
