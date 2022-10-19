import { renderFormSubmit } from './finshExam.js';
import {koTimer,$hrs,$mins,$secs} from './koTimer.js';
import {addData} from './localstorageSaveData.js'
function display1(data,i){
    var self = this;
    self.option1 = ko.observable(data);
    self.values = ko.observable(`option${i+1}`);
}

function display2(data,i,localvalue){
    var self = this;
    self.option1 = ko.observable(data);
    self.values = ko.observable(`option${i+1}`);
    self.chosenItems = ko.observable(localvalue);
}

function display(data,options,i) {
    var self = this;
    self.option = ko.observableArray();
    self.className = ko.observable(`question ${i+1}`);
    self.Question = ko.observable(`${i+1}.  ${data[i].Question}`)
    var localVariable = `option${i+1}`;
    var localvalue = localStorage.getItem(localVariable);
    for (const key in options) {
    if(localStorage == null || undefined){
            self.option.push(
                new display1(options[key],i)
            )
    }
        else{
            self.option.push(
                new display2(options[key],i,localvalue)
            )
        }
    }

}

 function questionOptionMV(kodata) {
        var optCount = 1;
        var self  = this; 
        self.Title = ko.observable(kodata[0].TestTitle+"  Assessment");
        self.questionOption = ko.observableArray();
        self.hour = ko.observable();
        self.seconds = ko.observable();
        self.minutes = ko.observable();
        setInterval(function () {
            self.hour($hrs);
            self.minutes($mins);
            self.seconds($secs)
        },1000);
            var show = 0;
            self.show = ko.observable(show);
            self.leng = ko.observable(Object.keys(kodata).length-2);
            function dpdata(i){
                var options =JSON.parse(kodata[i]["Options"]);
            
                self.questionOption([
                    new display(kodata,options,i)
                ])
                   
        }
        console.log(self.leng())
        self.prev = function(){
            console.log(self.show())
            if (addData(self.show()+1)){
            self.show(self.show()-1) 
            localStorage.setItem("num",self.show())
            dpdata(self.show());
            }
        }
        self.next = function() {
            if (addData(self.show()+1)){
                self.show(self.show()+1) 
                localStorage.setItem("num",self.show())
                dpdata(self.show());
            }
        }
        if (localStorage.getItem("num") !== null || undefined){
        dpdata(parseInt(localStorage.getItem("num")));
        self.show(parseInt(localStorage.getItem("num")));
        }
        else
        dpdata(show);  
    }
 export {questionOptionMV};