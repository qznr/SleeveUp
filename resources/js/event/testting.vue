<template>
    <div class="box">
        <header class="header">
            <div class="background">
                <div class="find-the-one-you">
                    <p class="text-wrapper">Find the One You Want!</p>
                    <p class="div">Temukan Event, Workshop, dan pelatihan Kerja Terbaik untuk pengembangan Karirmu!</p>
                    <div class="search-bar">
                        <svg width="45" height="45" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="Search Icon">
                                <path id="Vector" d="M30 7.5C17.5934 7.5 7.5 17.5934 7.5 30C7.5 42.4066 17.5934 52.5 30 52.5C42.4066 52.5 52.5 42.4066 52.5 30C52.5 17.5934 42.4066 7.5 30 7.5ZM40.7004 40.7004C40.3488 41.0518 39.8721 41.2491 39.375 41.2491C38.8779 41.2491 38.4012 41.0518 38.0496 40.7004L33.0293 35.6813C30.9084 37.1407 28.3186 37.7549 25.7682 37.4032C23.2178 37.0516 20.8909 35.7595 19.2441 33.7805C17.5972 31.8016 16.7494 29.2787 16.867 26.7068C16.9845 24.135 18.0589 21.6999 19.8794 19.8794C21.6999 18.0589 24.135 16.9845 26.7068 16.867C29.2787 16.7494 31.8016 17.5972 33.7805 19.2441C35.7595 20.8909 37.0516 23.2178 37.4032 25.7682C37.7549 28.3186 37.1407 30.9084 35.6813 33.0293L40.7004 38.0496C41.0518 38.4012 41.2491 38.8779 41.2491 39.375C41.2491 39.8721 41.0518 40.3488 40.7004 40.7004Z" fill="white"/>
                                <path id="Vector_2" d="M27.1875 33.75C30.8119 33.75 33.75 30.8119 33.75 27.1875C33.75 23.5631 30.8119 20.625 27.1875 20.625C23.5631 20.625 20.625 23.5631 20.625 27.1875C20.625 30.8119 23.5631 33.75 27.1875 33.75Z" fill="white"/>
                            </g>
                        </svg>
                        <input class="search-input" type="text" />
                    </div>
                </div>
            </div>
        </header>
        <div class="filter-sort-container">
                <button class="filter">Filter</button>
                <button class="sortBy">Sort By</button>
        </div>
        <div class="background-card">
            <div class="image-event" />
            <div class="tanggal">
                <div class="text-wrapper-3">Sabtu, 27 Januari 2024</div>
            </div>
            <div class="free">
                <div class="text-wrapper-4">Free Registration</div>
            </div>
            <div class="event-title">UI/UX Webinar Series</div>
            <div class="organizer">By Canadian Education International</div>
            <p class="pemateri">
                pemateri : Filbert mangundap
            </p>
            <p class="deskripsi">
                Lorem ipsum
            </p>
            <div class="detail-container">
                <button class="detail">Detail</button>
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
body {
    background-color: #151126;
    margin: 0;
    font-family: Roboto, sans-serif;
}

.box {
    width: 100%;
}

.background {
    color: #151126;
    width: 100%;
    padding: 0;
}

.header {
    background-color: transparent;
    width: 100%;
    padding: 0;
    box-sizing: border-box;
    text-align: center;
    font-size: 16px;
    color: #151126;
    font-family: Roboto;
    position: relative;
}

.background-card {
    align-items: center;
    background-color: #ffffff;
    display: flex;
    flex-direction: column;
    gap: 30px;
    justify-content: center;
    padding: 60px 0;
    height: 43%;
    width: 75%;
    box-sizing: border-box;
    margin: 0;
    z-index: 1;
    position: absolute;
    top: 110%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 20px;
}

.find-the-one-you {
    align-items: center;
    background-color: #ffffff;
    display: flex;
    flex-direction: column;
    gap: 30px;
    justify-content: center;
    padding: 60px 0;
    width: 100%;
    box-sizing: border-box;
    margin: 0;
    z-index: 1;
}

.text-wrapper {
    color: #5742f5;
    font-family: "Inter-BoldItalic", Helvetica;
    font-size: 60px;
    font-weight: 700;
    text-align: center;
    width: 100%;
    max-width: 1321px;
}

.div {
    color: #151126;
    font-family: "Roboto-SemiBold", Helvetica;
    font-size: 28px;
    font-weight: 600;
    text-align: center;
    width: 100%;
    max-width: 1336px;
}

.search-bar {
    background-color: #25b4c4;
    border-radius: 30px;
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px;
    width: 100%;
    max-width: 756px;
}

.search-input {
    background-color: #25b4c4;
    flex-grow: 1;
    border: none;
    outline: none;
    padding: 10px;
    border-radius: 20px;
}

.search-icon {
    width: 24px;
    height: 24px;
}

.filter-sort-container {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
    margin-top: 20px;
    padding: 20px;
    position: absolute;
    top: 450; /* Align it to the top */
    right: 50px; /* Add some left margin for spacing */
}

.filter,
.sortBy {
    background-color: #ffffff;
    border-radius: 12px;
    padding: 10px 30px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-family: "Roboto-Bold", helvetica;
    font-size: 16px;
    font-weight: 700;
    color: #151126;
    text-align: center;
    border: none; /* Remove the default button border */
    cursor: pointer; /* Add a pointer cursor */
}

.image-event {
    background-image: url(./Event.png);
    background-position: center;
    background-size: cover;
    height: 250px;
    width: 100%;
    max-width: 250px;
    position: absolute;
    top: 10% auto;
    left: 1%;
}

.free {
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
    padding: 10px 20px;
    margin: 10px auto; /* Center the element and add some space */
    width: fit-content;
    position: absolute;
    top: 5%;
    left: 28%;
}

.tanggal {
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
    padding: 10px 20px;
    margin: 10px auto; /* Center the element and add some space */
    width: fit-content;
    position: absolute;
    top: 5%;
    left: 48%;
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

.event-title {
    color: #381d4f;
    font-family: "Roboto-SemiBold", Helvetica;
    font-size: 28px;
    font-weight: 600;
    text-align: center;
    position: absolute;
    top: 29%;
    left: 28%;
}

.organizer {
    color: #381d4f;
    font-family: "Roboto-Medium", Helvetica;
    font-size: 22px;
    font-weight: 550;
    text-align: center;
    margin-bottom: 20px;
    position: absolute;
    top: 45%;
    left: 28%;
}

.pemateri {
    color: #151126;
    font-family: "Roboto-Regular", Helvetica;
    font-size: 16px;
    font-weight: 500;
    margin: 20px 0;
    text-align: center;
    position: absolute;
    top: 54%;
    left: 28%;
}

.deskripsi {
    color: #151126;
    font-family: "Roboto-Regular", Helvetica;
    font-size: 16px;
    font-weight: 500;
    margin: 20px 0;
    text-align: center;
    position: absolute;
    top: 70%;
    left: 28%;
}

.detail-container {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
    margin-top: 20px;
    padding: 20px;
    position: absolute;
    top: 62%; /* Align it to the top */
    right: 50px; /* Add some left margin for spacing */
}

.detail {
    background-color: #5742f5;
    border-radius: 12px;
    padding: 10px 30px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-family: "Roboto-Bold", helvetica;
    font-size: 16px;
    font-weight: 700;
    color: #ffffff;
    text-align: center;
    border: none; /* Remove the default button border */
    cursor: pointer; /* Add a pointer cursor */
}

@media (max-width: 768px) {
    .text-wrapper {
        font-size: 40px;
    }

    .div {
        font-size: 20px;
    }

    .filter-sort-container {
        flex-direction: column;
        align-items: center;
    }

    .filter,
    .sortBy {
        width: 100%;
        padding: 10px;
    }
}

@media (max-width: 480px) {
    .text-wrapper {
        font-size: 30px;
    }

    .div {
        font-size: 16px;
    }

    .search-bar {
        flex-direction: column;
    }

    .filter,
    .sortBy {
        width: 100%;
        padding: 10px;
    }
}
</style>
