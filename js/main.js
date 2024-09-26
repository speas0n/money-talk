$(document).ready(function () {
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('service-worker.js')
        .then(function(reg) {
        console.log('Service Worker Registered!', reg);
        });
    }
    const currentMonth = new Date().getMonth() + 1; 
    $('#select-month').val(currentMonth);
    
    const currentYear = new Date().getFullYear();
    for (let i = 0; i < 5; i++) {
        const year = currentYear - i;
        $('#select-year').append(new Option(year, year));
    }
    $('#select-year').val(currentYear);

    $('#openForm').on('click', function () {
        var today = new Date();
        var day = String(today.getDate()).padStart(2, '0');
        var month = String(today.getMonth() + 1).padStart(2, '0');
        var year = today.getFullYear();
        var formattedDate = year + '-' + month + '-' + day;
        
        $.confirm({
            theme: 'supervan',
            title: 'Add New Expenses',
            content: '' +
            '<form action="" class="formName">' +
            '<div class="form-group">' +
            '<label>Date</label>' +
            '<input type="date" class="date form-control" id="form-date" required value="' + formattedDate + '"/>' +
            '</div>' +
            '<div class="form-group">' +
            '<label>Type</label>' +
            '<input type="text" placeholder="Enter type" class="type form-control" required />' +
            '</div>' +
            '<div class="form-group">' +
            '<label>Amount</label>' +
            '<input type="number" id="numberInput" name="numberInput" min="0" step="0.01" required placeholder="Enter amount" class="amount form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, \'\');" />' +
            '</div>' +
            '<div class="form-group">' +
            '<label>Comment</label>' +
            '<textarea placeholder="Enter comment" class="comment form-control" required></textarea>' +
            '</div>' +
            '<input type="hidden" value="insert" class="method form-control" />' +
            '</form>',
            buttons: {
                formSubmit: {
                    text: 'Submit',
                    btnClass: 'btn-blue',
                    action: function () {
                        // Retrieve values from the form inside the modal
                        var date = this.$content.find('.date').val();
                        var type = this.$content.find('.type').val();
                        var amount = this.$content.find('.amount').val();
                        var comment = this.$content.find('.comment').val();
                        var method = this.$content.find('.method').val();

                        if (!date || !type || !amount || !method) {
                            $.alert('All fields are required!');
                            return false;
                        }

                        $('#hiddenDate').val(date);
                        $('#hiddenType').val(type);
                        $('#hiddenAmount').val(amount);
                        $('#hiddenComment').val(comment);
                        $('#hiddenMethod').val(method);

                        $('#myForm').submit();
                    }
                },
                cancel: function () {
                }
            },
            onContentReady: function () {
                var jc = this;
                this.$content.find('form').on('submit', function (e) {
                    e.preventDefault();
                    jc.$$formSubmit.trigger('click');
                });
            }
        });
    });
});

function formatCurrency(value) {
    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function setThisMonthAmount(value){
    var formattedValue = formatCurrency(value);
    $('.this-month').text('¥' + formattedValue);
}

function setMaxAmount(value){
    var formattedValue = formatCurrency(value);
    $('.max-amount').text('¥' + formattedValue);
}