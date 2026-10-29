// // document.addEventListener("DOMContentLoaded", () => {
// //     const dropZone = document.getElementById("drop-zone");
// //     const fileInput = document.getElementById("file-input");
// //     const filePreview = document.getElementById("file-preview");

// //     dropZone.addEventListener("dragover", (e) => {
// //         e.preventDefault();
// //         dropZone.classList.add("drop-zone--over");
// //     });

// //     dropZone.addEventListener("dragleave", () => dropZone.classList.remove("drop-zone--over"));

// //     dropZone.addEventListener("drop", (e) => {
// //         e.preventDefault();
// //         dropZone.classList.remove("drop-zone--over");
// //         if (e.dataTransfer.files.length) {
// //             handleFiles(e.dataTransfer.files);
// //         }
// //     });

// //     fileInput.addEventListener("change", () => {
// //         if (fileInput.files.length) {
// //             handleFiles(fileInput.files);
// //         }
// //     });

// //     function handleFiles(files) {
// //         Array.from(files).forEach((file, index) => {
// //             // Check if the file already exists in the preview
// //             if (isFileAlreadyAdded(file.name)) {
// //                 alert("File " + file.name + " is already added.");
// //                 return; // Skip adding this file
// //             }

// //             const fileReader = new FileReader();
// //             fileReader.readAsDataURL(file);
// //             fileReader.onload = () => {
// //                 const previewItem = document.createElement("div");
// //                 previewItem.classList.add("file-preview__item");

// //                 const img = document.createElement("img");
// //                 img.src = fileReader.result;
// //                 img.classList.add("file-preview__img");

// //                 const details = document.createElement("div");
// //                 details.classList.add("file-preview__details");
// //                 details.innerHTML = `
// //                     <div>${(file.size / 1024).toFixed(1)} KB</div>
// //                 `;

// //                 const removeButton = document.createElement("button");
// //                 removeButton.classList.add("file-preview__remove");
// //                 removeButton.innerHTML = `<div class='btn btn-label-danger btn-xs'>Remove</div>`;
// //                 removeButton.addEventListener("click", () => {
// //                     filePreview.removeChild(previewItem);
// //                 });

// //                 previewItem.appendChild(img);
// //                 previewItem.appendChild(details);
// //                 previewItem.appendChild(removeButton);
// //                 filePreview.appendChild(previewItem);
// //             };
// //         });
// //     }

// //     function isFileAlreadyAdded(fileName) {
// //         const previewItems = filePreview.getElementsByClassName("file-preview__item");
// //         for (let item of previewItems) {
// //             const itemName = item.querySelector(".file-preview__details > div").textContent.trim();
// //             if (itemName === fileName) {
// //                 return true;
// //             }
// //         }
// //         return false;
// //     }
// // });
// // document.addEventListener("DOMContentLoaded", () => {
// //     const dropZone = document.getElementById("drop-zone");
// //     const fileInput = document.getElementById("file-input");
// //     const filePreview = document.getElementById("file-preview");

// //     dropZone.addEventListener("dragover", (e) => {
// //         e.preventDefault();
// //         dropZone.classList.add("drop-zone--over");
// //     });

// //     dropZone.addEventListener("dragleave", () => dropZone.classList.remove("drop-zone--over"));

// //     dropZone.addEventListener("drop", (e) => {
// //         e.preventDefault();
// //         dropZone.classList.remove("drop-zone--over");
// //         if (e.dataTransfer.files.length) {
// //             handleFiles(e.dataTransfer.files);
// //         }
// //     });

// //     fileInput.addEventListener("change", () => {
// //         if (fileInput.files.length) {
// //             handleFiles(fileInput.files);
// //         }
// //     });

// //     function handleFiles(files) {
// //         Array.from(files).forEach((file, index) => {
// //             const fileReader = new FileReader();
// //             fileReader.readAsDataURL(file);
// //             fileReader.onload = () => {
// //                 const existingItem = findExistingPreviewItem(file.name);
// //                 if (existingItem) {
// //                     // Update existing preview item with new image
// //                     const img = existingItem.querySelector(".file-preview__img");
// //                     img.src = fileReader.result;
// //                 } else {
// //                     // Create new preview item
// //                     const previewItem = document.createElement("div");
// //                     previewItem.classList.add("file-preview__item");
    
// //                     const img = document.createElement("img");
// //                     img.src = fileReader.result;
// //                     img.classList.add("file-preview__img");
    
// //                     const details = document.createElement("div");
// //                     details.classList.add("file-preview__details");
// //                     details.innerHTML = `
// //                         <div>${(file.size / 1024).toFixed(1)} KB</div>
// //                     `;
    
// //                     const removeButton = document.createElement("button");
// //                     removeButton.classList.add("file-preview__remove");
// //                     removeButton.innerHTML = `<div class='btn btn-label-danger btn-xs'>Remove</div>`;
// //                     removeButton.addEventListener("click", () => {
// //                         filePreview.removeChild(previewItem);
// //                     });
    
// //                     previewItem.appendChild(img);
// //                     previewItem.appendChild(details);
// //                     previewItem.appendChild(removeButton);
    
// //                     filePreview.appendChild(previewItem);
// //                 }
// //             };
// //         });
// //     }

// //     function findExistingPreviewItem(fileName) {
// //         const previewItems = filePreview.getElementsByClassName("file-preview__item");
// //         for (let item of previewItems) {
// //             const img = item.querySelector(".file-preview__img");
// //             const imgSrc = img.src;
// //             // Extract the file name from the image source
// //             const existingFileName = imgSrc.substring(imgSrc.lastIndexOf('/') + 1);
// //             if (existingFileName === fileName) {
// //                 return item;
// //             }
// //         }
// //         return null;
// //     }
    
// //     function isFileAlreadyAdded(fileName) {
// //         const previewItems = filePreview.getElementsByClassName("file-preview__item");
// //         for (let item of previewItems) {
// //             const itemName = item.querySelector(".file-preview__details > div").textContent.trim();
// //             if (itemName === fileName) {
// //                 return true;
// //             }
// //         }
// //         return false;
// //     }
// //     // function isFileAlreadyAdded(fileName) {
// //     //     const previewItems = filePreview.getElementsByClassName("file-preview__item");
// //     //     for (let item of previewItems) {
// //     //         const imgSrc = item.querySelector(".file-preview__img").src;
// //     //         // Extract the file name from the image source
// //     //         const existingFileName = imgSrc.substring(imgSrc.lastIndexOf('/') + 1);
// //     //         if (existingFileName === fileName) {
// //     //             return true;
// //     //         }
// //     //     }
// //     //     return false;
// //     // }

// //     // function removeExistingPreview(fileName) {
// //     //     const previewItems = filePreview.getElementsByClassName("file-preview__item");
// //     //     for (let item of previewItems) {
// //     //         const itemName = item.querySelector(".file-preview__details > div").textContent.trim();
// //     //         if (itemName === fileName) {
// //     //             filePreview.removeChild(item);
// //     //             break; // Exit the loop after removing the item
// //     //         }
// //     //     }
// //     // }
// // });
// document.addEventListener("DOMContentLoaded", () => {
//     const dropZone = document.getElementById("drop-zone");
//     const fileInput = document.getElementById("file-input");
//     const filePreview = document.getElementById("file-preview");

//     dropZone.addEventListener("dragover", (e) => {
//         e.preventDefault();
//         dropZone.classList.add("drop-zone--over");
//     });

//     dropZone.addEventListener("dragleave", () => dropZone.classList.remove("drop-zone--over"));

//     dropZone.addEventListener("drop", (e) => {
//         e.preventDefault();
//         dropZone.classList.remove("drop-zone--over");
//         handleFiles(e.dataTransfer.files);
//     });

//     fileInput.addEventListener("change", () => {
//         handleFiles(fileInput.files);
//     });

//     const uploadedFiles = []; // Array to store uploaded file names

//     function handleFiles(files) {
//         Array.from(files).forEach(file => {
//             if (!uploadedFiles.includes(file.name)) {
//                 // File is not yet uploaded, proceed to add it
//                 const fileReader = new FileReader();
//                 fileReader.readAsDataURL(file);
//                 fileReader.onload = () => {
//                     const previewItem = createPreviewItem(file, fileReader.result);
//                     filePreview.appendChild(previewItem);
//                     uploadedFiles.push(file.name);
//                 };
//             } else {
//                 alert("File " + file.name + " is already added.");
//             }
//         });
//     }

//     function createPreviewItem(file, imageUrl) {
//         const previewItem = document.createElement("div");
//         previewItem.classList.add("file-preview__item");

//         const img = document.createElement("img");
//         img.src = imageUrl;
//         img.classList.add("file-preview__img");

//         const details = document.createElement("div");
//         details.classList.add("file-preview__details");
//         details.innerHTML = `
//             <div>${(file.size / 1024).toFixed(1)} KB</div>
//         `;

//         const removeButton = document.createElement("button");
//         removeButton.classList.add("file-preview__remove");
//         removeButton.innerHTML = `<div class='btn btn-label-danger btn-xs'>Remove</div>`;
//         removeButton.addEventListener("click", () => {
//             filePreview.removeChild(previewItem);
//             const index = uploadedFiles.indexOf(file.name);
//             if (index !== -1) {
//                 uploadedFiles.splice(index, 1);
//             }
//         });

//         previewItem.appendChild(img);
//         previewItem.appendChild(details);
//         previewItem.appendChild(removeButton);

//         return previewItem;
//     }
// });

