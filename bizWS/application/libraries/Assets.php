<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Assets {

    var $currentAssets = array(
        'Cash' => 0,
        'Petty cash' => 0,
        'Accounts Receivables' => 0,
        'Inventory' => 0,
        'Prepaid expenses' => 0,
        'Employee Advances' => 0,
        'Temporary investment' => 0
    );
    var $fixedAssets = array(
        'Land' => 0,
        'Buildings' => 0,
        'Furniture and Equipment' => 0,
        'Computer Equipment' => 0,
        'Vehicles' => 0,
        'Accumulated Depreciation' => 1,
    );
    var $otherAssets = array(
        'Trademarks' => 0,
        'Patents' => 0,
        'Security Deposits' => 0,
        'Other Assets' => 0,
    );
    var $currentLiabilities = array(
        'Accounts Payable' => 0,
        'Business Credit card' => 0,
        'Sales tax payable' => 0,
        'Payroll liabilities' => 0,
        'Other liabilities' => 0,
        'Current portion of long-term debt' => 0,
    );
    var $longTermLiabilities = array(
        'Notes Payable' => 0,
        'Mortgage payable' => 0,
        'Current portion of long-term debt' => 1,
    );
    var $equity = array(
        'Capital Stock/Partner\'s Equity' => 0,
        'Opening Retained Earnings' => 0,
        'Dividends Paid/Owner\'s Draw' => 1,
        'Net Income' => 0,
    );
    var $businessSetup = array(
        'Accountant\'s fees' => 0,
        'Solicitor\'s fees' => 0,
        'Business registration' => 0,
        'Domain name registration' => 0,
        'Insurance premiums' => 0,
        'Licences' => 0,
        'Workers compensation' => 0
    );
    var $premisesSetup = array(
        'Lease deposit and advance rent' => 0,
        'Fitout' => 0,
        'Utility bonds and connection' => 0,
        'Stationery and office supplies' => 0,
    );
    var $equipmentSetup = array(
        'Equipment' => 0,
        'Vehicles' => 0,
        'Telecommunications' => 0,
        'Computers and software' => 0,
    );
    var $operationsSetup = array(
        'Advertising and promotion' => 0,
        'Raw materials and supplies' => 0,
        'Working capital' => 0,
    );
    var $capitalSetup = array(
        'Equity investment' => 0,
        'Borrowings' => 0,
    );
    var $revenuesStatement = array(
        'Product/Service 1' => 0,
        'Product/Service 2' => 0,
        'Product/Service 3' => 0,
        'Other Revenue' => 0,
    );
    var $goodsStatement = array(
        'Product/Service 1' => 0,
        'Product/Service 2' => 0,
        'Product/Service 3' => 0,
        'Salaries-Direct' => 0,
        'Payroll Taxes and Benefits-Direct' => 0,
        'Depreciation-Direct' => 0,
        'Supplies' => 0,
        'Other Direct Costs' => 0,
    );
    var $operatingStatement = array(
        'Advertising and Promotion' => 0,
        'Automobile/Transportation' => 0,
        'Bad Debts/Losses and Thefts' => 0,
        'Bank Service Charges' => 0,
        'Business Licenses and Permits' => 0,
        'Charitable Contributions' => 0,
        'Computer and Internet' => 0,
        'Continuing Education' => 0,
        'Depreciation-Indirect' => 0,
        'Dues and Subscriptions' => 0,
        'Insurance' => 0,
        'Meals and Entertainment' => 0,
        'Merchant Account Fees' => 0,
        'Miscellaneous Expense' => 0,
        'Office Supplies' => 0,
        'Payroll Processing' => 0,
        'Postage and Delivery' => 0,
        'Printing and Reproduction' => 0,
        'Professional Services - Legal, Accounting' => 0,
        'Occupancy' => 0,
        'Rental Payments' => 0,
        'Salaries-Indirect' => 0,
        'Payroll Taxes and Benefits-Indirect' => 0,
        'Subcontractor' => 0,
        'Telephone' => 0,
        'Travel' => 0,
        'Utilities' => 0,
        'Website Development' => 0,
    );
    var $interestStatement = array(
        'Interest (Income)' => 1,
        'Interest Expense' => 0,
        'Income Tax Expense' => 0,
    );
    var $handcfCashflow = array(
        'Beginning Cash On Hand' => 0,
    );
    var $receiptscfCashflow = array(
        'Cash Sales' => 0,
        'Collections from Customer Credit Accounts' => 0,
        'Loan or Other Cash Injection' => 0,
        'Interest Income' => 0,
        'Income Tax Refund' => 0,
        'Misc. Cash Receipts' => 0,
    );
    var $goodscfCashflow = array(
        'Direct Product/Service Costs' => 0,
        'Salaries-Direct' => 0,
        'Payroll Taxes and Benefits-Direct' => 0,
        'Supplies' => 0,
        'Other Costs' => 0,
    );
    var $operatingcfCashflow = array(
        'Advertising and Promotion' => 0,
        'Automobile/Transportation' => 0,
        'Bank Service Charges' => 0,
        'Business Licenses and Permits' => 0,
        'Charitable Contributions' => 0,
        'Computer and Internet' => 0,
        'Continuing Education' => 0,
        'Dues and Subscriptions' => 0,
        'Insurance' => 0,
        'Meals and Entertainment' => 0,
        'Merchant Account Fees' => 0,
        'Miscellaneous Expense' => 0,
        'Office Supplies' => 0,
        'Payroll Processing' => 0,
        'Postage and Delivery' => 0,
        'Printing and Reproduction' => 0,
        'Professional Services - Legal, Accounting' => 0,
        'Occupancy' => 0,
        'Rental Payments' => 0,
        'Salaries-Indirect' => 0,
        'Payroll Taxes and Benefits-Indirect' => 0,
        'Subcontractor' => 0,
        'Telephone' => 0,
        'Travel' => 0,
        'Utilities' => 0,
        'Website Development' => 0,
    );
    var $othercfCashflow = array(
        'Interest Expense' => 0,
        'Income Tax Expense' => 0,
        'Cash Disbursements to Owners' => 0,
    );

}
