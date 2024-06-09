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
            <div class="image-event"></div>
            <div class="tanggal">
                <div class="text-wrapper-3">Sabtu, 27 Januari 2024</div>
            </div>
            <div class="free">
                <div class="text-wrapper-4">Free Registration</div>
            </div>
            <div class="event-title">UI/UX Webinar Series</div>
            <div class="organizer">By Canadian Education International</div>
            <p class="pemateri">pemateri : Filbert mangundap</p>
            <p class="deskripsi">Lorem ipsum</p>
            <div class="detail-container">
                <button class="detail" @click="isModalVisible = true">Detail</button>
            </div>
        </div>
        <Modal :show="isModalVisible" @close="isModalVisible = false">
            <template #default>
                <div class="modal-content">
                    <div class="detail-pop">EVENT DETAILS</div>
                    <div class="modal-image">
                        <img src="./popup.png" alt="Event Image" />
                    </div>
                    <div class="by-canadian-wrapper">By Canadian Education International</div>
                    <div class="UI-wrapper">UI/UX CEI WEBINAR SERIES</div>
                    <div class="freeP">
                            <div class="free-wrapper">FREE</div>
                    </div>
                    <div class="DTL-wrapper">
                        <div class="datew">DATE</div>
                        <div class="timew">TIME</div>
                        <div class="locationw">LOCATION</div>
                    </div>
                    <div class="DTL">
                        <div class="date">Sabtu, 27 Januari 2024</div>
                        <div class="time">10.00 - 11.00 WIB</div>
                        <div class="location">ZOOM Meeting</div>
                    </div>
                    <div class="pemateri-wrap"></div>
                    <div class="pemateri-l">
                        Pemateri:
                        <br></br>
                        - materi
                        <br></br>
                        - materi
                        <br></br>
                        - materi
                        <br></br>
                        - materi
                    </div>
                    <div class="more-information-w">
                        <div class="more-information">MORE INFORMATION</div>
                    </div>
                    <br></br>
                    <div class="ig">
                        <a href="https://www.instagram.com/Nama-akun" target="_blank">
                            <img src="./ig.png">
                            <div class="akun-ig">@Nama-akun</div>
                        </a>
                    </div>
                    <br></br>
                    <div class="fb">
                        <a href="https://www.facebook.com/Nama-akun" target="_blank">
                            <img src="./fb.png">
                            <div class="akun-fb">@Nama-akun</div>
                        </a>
                    </div>
                    <br></br>
                    <div class="x">
                        <a href="https://www.x.com/Nama-akun" target="_blank">
                            <img src="./x.png">
                            <div class="akun-x">@Nama-akun</div>
                        </a>
                    </div>
                    <br></br>
                    <div class="gm">
                        <a href="https://www.gmail.com/Nama-akun" target="_blank">
                            <img src="./gm.png">
                            <div class="akun-gm">@Nama-akun</div>
                        </a>
                    </div>
                    <br></br>
                    <div class="web">
                        <a href="https://www.website.com/Nama-akun" target="_blank">
                            <img src="./web.png">
                            <div class="akun-web">@Nama-akun</div>
                        </a>
                    </div>
                    <div class="qr">SCAN ME!
                        <div class="qrc">
                            <img src="./qr.png">
                        </div>
                    </div>
                    <div class="register-now">
                        <button class="register-nowb" @click="isModalBVisible = true">REGISTER NOW</button>
                    </div>
                    <Modal :show="isModalBVisible" @close="isModalBVisible = false">
                        <template #default>
                            <div class="pop-up-berhasil">
                                <div class="div-pop">
                                    <div class="overlap-group-pop">
                                        <img class="ep-success-fileed" src="./checklist.png"/>
                                        <div class="text-wrapper-pop">Anda Telah Terdaftar!</div>
                                    </div>
                                    <p class="p">Jangan lupa cek email anda untuk informasi lebih lanjut!</p>
                                    <div class="tombol">
                                        <button class="tombol-wrapper" @click="redirectToHomepage">KEMBALI KE HOMPAGE</button>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </Modal>
                <div class="modal-content"></div>
                    <div class="modal-footer">
                        <button @click="isModalVisible = false">X</button>
                    </div>
                </div>
            </template>
        </Modal>
    </div>
</template>



<script>
import { ref } from 'vue';
import Modal from '../components/Modal.vue';

export default {
    name: "Box",

    components: {
        Modal
    },
    setup() {
        const isModalVisible = ref(false);
        const isModalBVisible = ref(false);
        const redirectToHomepage = () => {
        window.location.href = '/homepage'; // Update the URL to match your homepage route
    };

        return {
            isModalVisible,
            isModalBVisible,
            redirectToHomepage
        };
    },
};
</script>

<style>
body {
    background-color: #151126;
    margin: 5;
    font-family: Roboto, sans-serif;
}

.image-event {
    background-image: url(./Event.png);
    background-position: center;
    background-size: cover;
    height: 250px;
    width: 100%;
    max-width: 250px;
    position: absolute;
    top: 10%;
    left: 1%;
}

.free {
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
    padding: 5px 10px;
    width: fit-content;
    position: absolute;
    top: 15%;
    left: 28%;
    background-color: #25b4c4;
}

.tanggal {
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
    padding: 5px 10px;
    width: fit-content;
    position: absolute;
    top: 15%;
    left: 45%;
    background-color: #ff8aaf;
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
    top: 62%;
    right: 50px;
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
    right: 50px;
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
    border: none;
    cursor: pointer;
}

.modal-content {
    padding: 20px;
    margin:auto;

}

.detail-pop {
    font-weight: 700;
}

.modal-image img {
    max-width: 45%;
    height: auto;
    display: block;
    margin: 0 20px 20px 0;

}

.detail-pop {
    font-size: 20;
}
.modal-details {
    margin-bottom: 20px;
}

.modal-footer {
    text-align: right;
}

.modal-footer button {
    background-color: #000000;
    border: none;
    border-radius: 12px;
    padding: 5px 10px;
    color: #fff;
    font-family: "Roboto-Bold", helvetica;
    font-size: 14px;
    cursor: pointer;
    position: relative;
    top: 30%;
    left: 94%;
}

.by-canadian-wrapper {
    position: absolute;
    top: 15%;
    left: 47%;
    font-size: 15;
}

.UI-wrapper {
    position: absolute;
    top: 10%;
    left: 47%;
    font-size: 20;
    font-weight: 700;
}

.freeP {
    position: absolute;
    top: 10%;
    left: 80%;
    background-color: #25b4c4;
    border: none;
    border-radius: 12px;
    padding: 1px 30px;
    color: #fff;
    font-family: "Roboto-Bold", helvetica;
    font-size: 10px;
    align-items: center;
    justify-content: center;
    width: fit-content;
    font-size: 20;
}

.datew {
    background-color: #ff8aaf;
    border: none;
    border-radius: 12px;
    padding: 5px 10px;
    font-size: 10;
    color: #fff;
    font-family: "Roboto-Bold", helvetica;
    font-size: 14px;
    cursor: pointer;
    position: absolute;
    top: 19.5%;
    left: 47%;
}

.date {
    position: absolute;
    top: 27%;
    left: 47%;
}

.timew {
    background-color: #ff8aaf;
    border: none;
    border-radius: 12px;
    padding: 5px 10px;
    color: #fff;
    font-family: "Roboto-Bold", helvetica;
    font-size: 14px;
    cursor: pointer;
    position: absolute;
    top: 33%;
    left: 47%;
}

.time {
    position: absolute;
    top: 41%;
    left: 47%;
    color: #000000;
}

.locationw {
    background-color: #ff8aaf;
    border: none;
    border-radius: 12px;
    padding: 5px 10px;
    color: #fff;
    font-family: "Roboto-Bold", helvetica;
    font-size: 14px;
    cursor: pointer;
    position: absolute;
    top: 47%;
    left: 47%;
}

.location {
    position: absolute;
    top: 55%;
    left: 47%;
}

.pemateri-wrap {
    background-color: #ff8aaf;
    padding: 80px 180px;
    position: absolute;
    top: 61%;
    left: 47%;
    margin: 0 20px 20px 0;
}

.pemateri-l {
    font-size: 20px;
    position: absolute;
    top: 61%;
    left: 48%;
}

.more-information-w {
    background-color: #25b4c4;
    border: none;
    border-radius: 12px;
    padding: 5px 80px;
    color: #fff;
    font-family: "Roboto-Bold", helvetica;
    font-size: 14px;
    align-items: center;
    justify-content: center;
    width: fit-content;
    font-size: 20;

}


.akun-ig {
    position: absolute;
    top: 95%;
    left: 9%;
}

.akun-fb {
    position: absolute;
    top: 106%;
    left: 9%;
}

.akun-x {
    position: absolute;
    top: 116.4%;
    left: 9%;
}

.akun-gm {
    position: absolute;
    top:126.5%;
    left: 9%;
}

.akun-web {
    position: absolute;
    top: 136.5%;
    left: 9%;
}

.akun-ig:hover, .akun-fb:hover, .akun-x:hover, .akun-gm:hover, .akun-web:hover {
    color: #25b4c4;
    cursor: pointer;
}

.qr {
    position:absolute;
    top: 100%;
    left: 47%;
    font-weight: 700;
    text-align: center;
}

.register-now {
    position: absolute;
    top: 130%;
    left: 75%;
    background-color: #5742f5;
    font-size: 20;
    color: #fff;
    padding: 8 20;
    border-radius: 12px;
}


.pop-up-berhasil {
    background-color: transparent;
    display: flex;
    flex-direction: row;
    justify-content: center;
    width: 100%;
}

.div-pop {
    background-image: url(./rectangle-37.png);
    background-size: 100% 100%;
    height: 300px;
    position: relative;
    width: 600px;
}

.overlap-group-pop {
    height: 110px;
    left: 33px;
    position: absolute;
    top: 39px;
    width: 608px;
    text-align: center;
    font-weight: 1000;
    font-size: 30;
}

.ep-success-fileed{
    position:absolute;
    left: 38%;
}

.text-wrapper-pop {
    position: absolute;
    top: 70;
    left: 20%;
}

.p {
    height: 19px;
    left: 0px;
    position: absolute;
    text-align: center;
    top: 155px;
    white-space: nowrap;
    width: 608px;
}

.tombol {
    align-items: center;
    border-radius: 10px;
    display: inline-flex;
    height: 34px;
    justify-content: center;
    left: 222px;
    padding: 15px 25px;
    position: absolute;
    top: 219px;
    left: 28%;
}

.tombol-wrapper {
    background-color: #5742f5;
    color:#ffffff;
    padding: 8 30;
    border-radius: 12px;
    font-weight: 500;
    letter-spacing: var();
    margin-bottom: -6.5px;
    margin-top: -8.5px;
    position: relative;
    text-align: center;
    white-space: nowrap;
    width: fit-content;
}

@media (max-width: 1024px) {
    .background-card {
        width: 90%;
        padding: 40px 0;
    }

    .image-event {
        height: 200px;
        max-width: 200px;
        top: 8%;
        left: 5%;
    }

    .free {
        left: 30%;
    }

    .tanggal {
        left: 50%;
    }

    .event-title {
        font-size: 24px;
        top: 28%;
        left: 30%;
    }

    .organizer {
        font-size: 20px;
        top: 40%;
        left: 30%;
    }

    .pemateri {
        font-size: 14px;
        top: 50%;
        left: 30%;
    }

    .deskripsi {
        font-size: 14px;
        top: 65%;
        left: 30%;
    }

    .detail-container {
        top: 75%;
        right: 40px;
    }
}

@media (max-width: 768px) {
    .background-card {
        width: 100%;
        padding: 20px 0;
    }

    .image-event {
        height: 150px;
        max-width: 150px;
        top: 6%;
        left: 3%;
    }

    .free {
        left: 32%;
    }

    .tanggal {
        left: 52%;
    }

    .event-title {
        font-size: 20px;
        top: 26%;
        left: 32%;
    }

    .organizer {
        font-size: 18px;
        top: 38%;
        left: 32%;
    }

    .pemateri {
        font-size: 12px;
        top: 48%;
        left: 32%;
    }

    .deskripsi {
        font-size: 12px;
        top: 60%;
        left: 32%;
    }

    .detail-container {
        top: 70%;
        right: 30px;
    }
}

@media (max-width: 480px) {
    .background-card {
        width: 100%;
        padding: 10px 0;
    }

    .image-event {
        height: 100px;
        max-width: 100px;
        top: 4%;
        left: 2%;
    }

    .free {
        left: 35%;
    }

    .tanggal {
        left: 55%;
    }

    .event-title {
        font-size: 18px;
        top: 24%;
        left: 35%;
    }

    .organizer {
        font-size: 16px;
        top: 36%;
        left: 35%;
    }

    .pemateri {
        font-size: 10px;
        top: 46%;
        left: 35%;
    }

    .deskripsi {
        font-size: 10px;
        top: 55%;
        left: 35%;
    }

    .detail-container {
        top: 65%;
        right: 20px;
    }
}

@media (max-width: 768px) {
    .modal-image img {
        max-width: 100%;
        margin: 0 0 20px 0;
    }

    .modal-footer button {
        left: 80%;
    }

    .by-canadian-wrapper, .UI-wrapper {
        left: 50%;
    }

    .freeP {
        left: 70%;
    }

    .datew, .timew, .locationw {
        left: 50%;
    }

    .pemateri-wrap {
        padding: 40px;
        top: 75%;
        left: 50%;
    }

    .more-information-w {
        padding: 5px 20px;
    }

    .akun-ig, .akun-fb, .akun-x, .akun-gm, .akun-web {
        left: 5%;
    }

    .qr {
        left: 50%;
    }

    .register-now {
        left: 65%;
    }
}
</style>


