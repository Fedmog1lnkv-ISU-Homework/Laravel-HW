
let checkbox = document.getElementById("is_publish_at_time")
let block = document.getElementById("publisher_time_line")

checkbox.addEventListener('change', () => {
	block.classList.toggle("disabled")
	document.getElementById("publisher_time").value = ""
})
