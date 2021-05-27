class Api {
	async send(method: string, path: string) {        
        return new Promise((resolve, reject) => {
            let xhr = this.newRequest(method, path);
            xhr.onload = function () {
                if (this.status >= 200 && this.status < 300) {
                    resolve(JSON.parse(xhr.response));
                } else {
                    reject({
                        status: this.status,
                        statusText: xhr.statusText
                    });
                }
            };
            xhr.onerror = function () {
                reject({
                    status: this.status,
                    statusText: xhr.statusText
                });
            };
            xhr.send();
        });
    }

    protected newRequest(method, path)
    {
        let xhr = new XMLHttpRequest();
        xhr.open(method, path);
        xhr.setRequestHeader('Accept', 'application/json');
        return xhr;
    }
}


export default new Api;