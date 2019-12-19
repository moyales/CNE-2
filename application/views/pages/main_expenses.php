<div class="main-form">
  <h1>Manage Your Expenses</h1>
  <!--
  <form method="POST" action="http://students.stevens.edu/cne/main/manage_expenses" accept-charset="utf-8">
  -->
  <form id="manageExpensesForm" accept-charset="utf-8">
    <div class="row">
      <div class="col-25">
        <label for="expenseType">Expense Type</label>
      </div>
      <div class="col-75">
        <div id="expenseTypeSelection">
          <input type="radio" name="expenseType" value="oneTime" checked>One Time
          <input type="radio" name="expenseType" value="recurring">Recurring  
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="expenseCategory">Expense Category</label>
      </div>
      <div class="col-75" id="expenseCategory">
        <select name="expenseCategory">
          <option value="oneTimeFood">Food</option>
          <option value="oneTimeEntertainment">Entertainment</option>
          <option value="oneTimeTransportation">Transportation</option>
          <option value="oneTimeShopping">Shopping</option>
          <option value="oneTimeSchoolExpense">School Expense</option>
          <option value="oneTimeOther">Other Expense</option>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="expenseFrequency">Frequency (If Recurring)</label>
      </div>
      <div class="col-75" id="expenseFrequency">
        <select name="expenseFrequency">
          <option value="notApplicable">N/A</option>
          <option value="weekly">Weekly</option>
          <option value="biWeekly">Bi-weekly</option>
          <option value="monthly">Monthly</option>
          <option value="annual">Annual</option>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="oneTimeExpenseDate">Date (If One-Time Expense)</label>
      </div>
      <div class="col-75">
        <input type="date" name="oneTimeExpenseDate" placeholder="1/1/2019">
      </div>
    </div>    

    <div class="row">
      <div class="col-25">
        <label for="expenseAmount">Amount</label>
      </div>
      <div class="col-75">
        <input type="number" name="expenseAmount" placeholder="$">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="expenseTitle">Expense Title</label>
      </div>
      <div class="col-75">
        <input type="text" name="expenseTitle" placeholder="Ex: Pizza, PATH Fare, etc.">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="expenseDescription">Expense Description (Optional)</label>
      </div>
      <div class="col-75">
        <input type="text" name="expenseDescription" id="expenseDescription" placeholder="Describe your expense">
      </div>
    </div>

    <div class="row">
        <input type="submit" value="Submit" id="manageExpensesSubmitButton">
    </div>
  </form>
</div>