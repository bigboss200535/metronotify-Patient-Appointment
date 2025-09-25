  // document.addEventListener('DOMContentLoaded', function () {
  //           const form = document.getElementById('info_page');
  //           const submitBtn = document.getElementById('save_contact_form');
  //           const responseBox = document.getElementById('form_response');
  //           // const actionUrl = form.dataset.url; // Get the route from data-url attribute

  //           form.addEventListener('submit', async function (e) {
  //               e.preventDefault();

  //               // Clear previous messages
  //               responseBox.innerHTML = '';

  //               // Disable submit button to prevent multiple clicks
  //               submitBtn.disabled = true;
  //               submitBtn.textContent = 'Submitting...';

  //               try {
  //                   // Collect form data
  //                   const formData = new FormData(form);

  //                   // Send AJAX request
  //                   const response = await fetch("{{ route('enquiry.store') }}", {
  //                       method: "POST",
  //                       headers: {
  //                           'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
  //                       },
  //                       body: formData
  //                   });

  //                   const result = await response.json();

  //                   // Handle validation or server errors
  //                   if (!response.ok) {
  //                       if (result.errors) {
  //                           let errorList = '<div class="alert alert-danger"><ul>';
  //                           for (const key in result.errors) {
  //                               errorList += `<li>${result.errors[key][0]}</li>`;
  //                           }
  //                           errorList += '</ul></div>';
  //                           responseBox.innerHTML = errorList;
  //                       } else {
  //                           responseBox.innerHTML = `<div class="alert alert-danger">${result.message || 'Something went wrong. Please try again.'}</div>`;
  //                       }
  //                   } else {
  //                       // Success response
  //                       responseBox.innerHTML = `<div class="alert alert-success">${result.message}</div>`;
                        
  //                       // Reset form after success
  //                       form.reset();
  //                   }
  //               } catch (error) {
  //                   console.error('Submission error:', error);
  //                   responseBox.innerHTML = `<div class="alert alert-danger">An unexpected error occurred. Please try again.</div>`;
  //               } finally {
  //                   // Re-enable the submit button
  //                   submitBtn.disabled = false;
  //                   submitBtn.textContent = 'Submit';
  //               }
  //           });
  //       });