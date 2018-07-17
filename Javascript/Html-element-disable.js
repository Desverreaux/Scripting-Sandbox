function parseRentPage() {
    
let result = {
    property: "",
    address: "",
    Number: "",
    Rent: "",
    URLstring: ""
};

result.property = $(".pdp-heading-name").text();
result.address = $(".pdp-heading-address").text();
result.Number = $("a.tel-default.attributed-click.hidden-xs.js-campaign-phone-number.js-phone:first").text();
result.Rent = $(".pdp-heading-meta-rent").text();
result.URLstring = window.location.href;

let resultString = "";
let delimiter = "!";


resultString += result.property + ",";
resultString += result.address + ",";
resultString += result.Number + ",";
resultString += result.Rent + ",";
resultString += result.URLstring + ";";

return resultString;

}


function fillbody(){

    let bodyText = "Hello, I'm interested in a 1 bedroom 1 bathroom apartment at ";
        bodyText += $(".pdp-heading-name:first").text();
        bodyText += "1322 North or anything similar. I have to have a place by August 1st so I would be immensely appreciative if you could get back to me ASAP. If you do have any vacancies, please send me any additional details I would need to start the renting process. Thank you and Have a good day!";
    
        $("div.lead-form-inline-field.lead-form-inline-field-textarea.lead-form-inline-field-message").text(bodyText);
    

}


