const videoPlayer = document.getElementById('video');
const videoPlayerContainer = document.getElementById('video-player');

function playVideo(videoName) {
	videoPlayer.src = `uploads/${videoName}`;
	videoPlayerContainer.style.display = 'block';
}

function deleteVideo(videoName) {
	const xhr = new XMLHttpRequest();
	xhr.open('POST', 'delete.php', true);
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.onload = function() {
		if (xhr.status === 200) {
			alert(xhr.responseText);
		} else {
			alert('Gagal menghapus video!');
		}
	}
	xhr.send(`videoName=${videoName}`);
}
