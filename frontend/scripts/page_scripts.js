const datingapp_pages = {};

datingapp_pages.baseURL = "http://127.0.0.1:8000/api/v1";

datingapp_pages.Console = (title, values, oneValue = true) => {
    console.log('---' + title + '---');
    if(oneValue){
        console.log(values);
    }else{
        for(let i =0; i< values.length; i++){
            console.log(values[i]);
        }
    }
    console.log('--/' + title + '---');
}

datingapp_pages.getAPI = async (api_url) => {
    try{
        return await axios(api_url);
    }catch(error){
        datingapp_pages.Console("Error from GET API", error);
    }
}

datingapp_pages.postAPI = async (api_url, api_data, api_token = null) => {
    try{
        return await axios.post(
            datingapp_pages.baseURL/api_url,
            api_data,
            { headers:{
                    'Authorization' : "token " + api_token
                }
            }
        );
    }catch(error){
        datingapp_pages.Console("Error from POST API", error);
    }
}

datingapp_pages.loadFor = (page) => {
    eval("datingapp_pages.load_" + page + "();");
}

datingapp_pages.load_landing = async () => {
    const landing_url = `${datingapp_pages.baseURL}/landing`;
    const response_landing = await datingapp_pages.getAPI(landing_url);
    datingapp_pages.Console("Testing Products API", response_landing.data.data);
}

datingapp_pages.load_products = () => {}
