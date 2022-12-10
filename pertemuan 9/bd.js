
  // Callback
// const showDownload = (result) => {
//     console.log("Download Selesai");
//     console.log("Hasil Download " + result);
// }


// const download = (callShowDownload) => {
//     setTimeout(function ()  {
//         const result = "Windows-10.exe";
//         callShowDownload(result);
//     }, 3000);
// }
// download(showDownload);



// Promise
//  const showDownload = (result) => {
//     console.log("Download Selesai");
//     console.log("Hasil Download " + result);

//  }

//  const download = (showDownload) => {
//     return new Promise((resolve) => {
//         setTimeout(function () {
//             const result = "windows-10.exe";
//             resolve(showDownload(result));
//         }, 3000);
//     })
//  };

//  download(showDownload);

 

// async wait
 const showDownload = async (result) => {
    console.log("Download Selesai");
    console.log("Hasil Download " + result);
 }

 const download = async (ShowDownload) => {
        setTimeout(async () =>  {
            const result = "Windows-10.exe";
            await showDownload(result);
        }, 3000);
    };
   
    download(showDownload);
