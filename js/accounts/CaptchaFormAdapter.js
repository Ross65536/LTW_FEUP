'use strict';
const RECAPTCHA_FORM_NAME = "g-recaptcha-response";

class CaptchaFormAdapter extends AjaxFormSubmitAdapter
{
    buildActionURI(event)
    {
        let formURL = super.buildActionURI(event);
        let captcha = grecaptcha.getResponse();
        let newGETURL = `${formURL}&${RECAPTCHA_FORM_NAME}=${captcha}`;
        return newGETURL;
    }

    handleJSONResponseTemplate(responseErrorList)
    {
        if(responseErrorList.length != 0) //some errors
            grecaptcha.reset();
        
        return super.handleJSONResponseTemplate(responseErrorList);
    }
}