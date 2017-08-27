class Translator {

  constructor(url, lang = "") {
    this.endpoint = url;
    this.lang = lang;
    this.t8path = null;
    this.files = {};
  }

  cachePath(path) {
    this.t8path = path;
  }

  load(path) {
    return new Promise((resolve, reject) => {
      if (this.files[path] === undefined) {
        fetch(this.endpoint + "?path=" + path + "&lang=" + this.lang, {
          headers: {
            Accept: "application/json"
          }
        }).catch(reject).then(resp => resp.json()).catch(reject).then(json => {
          this.files[path] = json;
          resolve(json);
        });
      } else {
        resolve(this.files[path]);
      }
    });
  }

  t8(path, string = null, data = null) {
    if (string === null) {
      string = path;
      path = this.t8path;
    }

    var t = this.getTranslatedStrings(path)[string] || (path + ":" + string);

    return data === null ? t : t.replace(/{\$(\d+)}/g, (b, d) => data[d] || "");
  }

  getTranslatedStrings(path) {
    if (this.files[path] === undefined) {
      throw new Error("Trying to use translations that have not been loaded.");
    }

    return this.files[path];
  }
}