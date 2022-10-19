function CreateAccountViewModel(){
    var self=this;
    var checkPassword = function(val, other) {  
        return val == other;  
    }
    self.firstName = ko.observable("").extend({
        required:true,
        minLength:5,
    });
    self.lastName = ko.observable("").extend({
        required:true,
        minLength:2,
    });
    self.userName = ko.observable("").extend({
        required:true,
        minLength:6,
    });
    self.emailAddress = ko.observable("").extend({
        required:true,
        email:true,
    });
    self.password = ko.observable("").extend({
        required:true,
        minLength:8,
        pattern: {
            message: "Password must contain one uppercase one lowercase one number and special charecter",
            params: /(?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/            
        },
        maxLength:10,
    });
    self.ConfirmPassword = ko.observable("").extend({areSame:{params: self.password, message: "Confirm password must match with the above password" },validator:checkPassword
});
     
    self.handleSubmit = function(){
        var errors = ko.validation.group(self);
        if(errors().length > 0){
            errors.showAllMessages();
            return;
        }
        var payload = {
            firstname : self.firstName(),
        }
        console.log(payload);
    }
};
ko.validation.rules['areSame'] = {
    getValue: function (o) {
        return (typeof o === 'function' ? o() : o);
    },
    validator: function (val, otherField) {
        return val === this.getValue(otherField);
    },
    message: 'The fields must have the same value'
};
$(document).ready(function () {
    ko.validation.registerExtenders();
    ko.applyBindings(new CreateAccountViewModel(),document.getElementById("Form2"));
});