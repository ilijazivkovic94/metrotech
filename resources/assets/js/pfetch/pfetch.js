const customFetch = (endpoint, options) => {
  if (!options) {
    options = {};
  }

  if (!options.method) {
    options.method = options.method || 'GET';
  }

  const defaultHeaders = {
    'Accept': 'application/json',
    'Content-Type': 'application/json',
      'Access-Control-Allow-Origin':'*'
  };

  options.headers = Object.assign({}, defaultHeaders, options.headers);

  if (typeof (options.body) !== 'string') {
      if (options.type && options.type === 'FORM-DATA'){
          delete options.headers['Content-Type'];
          let formData = new FormData();
          for (let prop in options.body) {
              formData.append(prop,options.body[prop]);
          }
          options.body = formData;
      } else{
          options.body = JSON.stringify(options.body);
      }
  }

  const apiUrl = location.hostname === 'localhost' ? 'http://localhost:3001/' : '/';
  const isFullUrl = endpoint.startsWith('http://') || endpoint.startsWith('https://');
  const url = (isFullUrl ? '' : apiUrl) + endpoint;
  const proxyurl = "https://cors-anywhere.herokuapp.com/";
  const fullUrl = options.is_cors ? proxyurl + url : url;
  return fetch(fullUrl , options).then(response => {
    const responseJson = response.json();
    if (response.ok) {
      return responseJson;
    }
    if (responseJson) {
      return responseJson.then(json => {
        console.error('HTTP ERROR: ', json);
        if (json.message) {
          //alert(json.message);
        }
        throw json;
      });
    }
    console.error('HTTP ERROR: ', response);
    throw response;
  });
};
export default customFetch;
