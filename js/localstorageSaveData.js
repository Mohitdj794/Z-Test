function addData(num){
    var value,opt; 
        value = $(`input[type='radio'][name='option${num}']:checked`).val();
        if (value == undefined){
            return confirm ("you not answered");
        }else {
        opt = `option${num}`
        localStorage.setItem(opt,value);
        return true;
        }
}
export {addData};