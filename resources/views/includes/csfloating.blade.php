 <style>
    
.floating-box {
  position: fixed;
  bottom: 20px;
  right: 20px;
  background-color: #007BFF;
  padding: 10px;
  border-radius: 20px;
  width: 55px;
  height: 55px;
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
  z-index: 3;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 30px;
  transition: transform 0.3s ease-in-out;
  transition: width 0.5s ease-in-out;
}


@media (max-width: 768px) {
  .floating-box {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #007BFF;
    padding: 10px;
    border-radius: 20px;
    width: 45px;
    height: 45px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
    z-index: 3;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    font-size: 25px;
    transition: transform 0.3s ease-in-out;
    transition: width 0.5s ease-in-out;
  }

}
 </style>
<a href="{{ route('faq') }}">
    <div id="musicBar" class="floating-box">
        <i class="fa-regular fa-circle-question" style="color: #ffffff; opacity: 70%;"></i>
    </div>
</a>