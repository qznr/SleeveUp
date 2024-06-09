<template>
    <div class="box">
        <div class="card">
            <div class="overlap">
                <div class="image-event" />
                <button class="button">
                    <div class="overlap-group">
                        <div class="text-wrapper">DETAILS</div>
                    </div>
                </button>
                <p class="pemateri">
                    pemateri : Filbert mangundap
                    <br />
                    <br />
                    Lorem ipsum
                </p>
                <div class="event-title">UI/UX Webinar Series</div>
                <div class="organizer">By Canadian Education International</div>
                <div class="tanggal">
                    <div class="text-wrapper-3">Sabtu, 27 Januari 2024</div>
                </div>
                <div class="free">
                    <div class="text-wrapper-4">Free Registration</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Box",
};
</script>

<style>
.box {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Full viewport height */
    width: 100%;
    background-color: #f0f0f0; /* Add some background color */
}

.card {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 80%; /* Adjust width as needed */
    max-width: 1000px; /* Max width for larger screens */
}

.overlap {
    background-color: #ffffff;
    border-radius: 30px;
    padding: 20px;
    width: 100%;
    box-sizing: border-box;
}

.image-event {
    background-image: url(./image-event.png);
    background-position: center;
    background-size: cover;
    border-radius: 30px;
    height: 200px;
    width: 100%;
    max-width: 250px;
    margin-bottom: 20px;
}

.button {
    all: unset;
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.overlap-group {
    background-color: #5732f5;
    border-radius: 8px;
    padding: 10px 20px;
    cursor: pointer;
}

.text-wrapper {
    color: #ffffff;
    font-family: "Roboto-Bold", Helvetica;
    font-size: 16px;
    font-weight: 700;
    text-align: center;
}

.pemateri {
    color: #151126;
    font-family: "Roboto-Regular", Helvetica;
    font-size: 16px;
    font-weight: 400;
    margin: 20px 0;
    text-align: center;
}

.event-title {
    color: #381d4f;
    font-family: "Roboto-SemiBold", Helvetica;
    font-size: 28px;
    font-weight: 600;
    text-align: center;
}

.organizer {
    color: #381d4f;
    font-family: "Roboto-Medium", Helvetica;
    font-size: 22px;
    font-weight: 500;
    text-align: center;
    margin-bottom: 20px;
}

.tanggal, .free {
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
    padding: 10px 20px;
    margin: 10px auto; /* Center the element and add some space */
    width: fit-content;
}

.tanggal {
    background-color: #ff8aaf;
}

.free {
    background-color: #25b4c4;
}

.text-wrapper-3, .text-wrapper-4 {
    color: #ffffff;
    font-family: "Roboto-Bold", Helvetica;
    font-size: 16px;
    font-weight: 700;
    text-align: center;
    white-space: nowrap;
}
</style>
