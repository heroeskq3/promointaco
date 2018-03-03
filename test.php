<style>
.stars > input{ /* HIDE RADIO */
  visibility: hidden; /* Makes input not-clickable */
  position: absolute; /* Remove input from document flow */
}
.stars > input + img{ /* IMAGE STYLES */
  cursor:pointer;
  border:2px solid transparent;
    opacity: 0.1;
}
.stars > input:checked + img{ /* (RADIO CHECKED) IMAGE STYLES */
    -webkit-transform:scale(1.30);
    -moz-transform:scale(1.30);
    -ms-transform:scale(1.30);
    -o-transform:scale(1.30);
    transform:scale(1.30);

    opacity: 1;
}
.stars > input:hover + img{ /* (RADIO CHECKED) IMAGE STYLES */

    opacity: 1;
    -moz-transition:    all 500ms ease;
    -webkit-transition: all 500ms ease;
    -o-transition:      all 500ms ease;
    -ms-transition:     all 500ms ease;
    transition:         all 500ms ease;

    -webkit-transform:scale(1.30);
    -moz-transform:scale(1.30);
    -ms-transform:scale(1.30);
    -o-transform:scale(1.30);
    transform:scale(1.30);

    -webkit-transition:all .9s ease; /* Safari y Chrome */
    -moz-transition:all .9s ease; /* Firefox */
    -o-transition:all .9s ease; /* IE 9 */
    -ms-transition:all .9s ease; /* Opera */
}
.stars > input:before + img{ /* (RADIO CHECKED) IMAGE STYLES */
    -webkit-transition:all .9s ease; /* Safari y Chrome */
    -moz-transition:all .9s ease; /* Firefox */
    -o-transition:all .9s ease; /* IE 9 */
    -ms-transition:all .9s ease; /* Opera */
}
</style>
<label class="stars">
  <input type="radio" name="fb" value="small" />
  <img src="resources/surveys/Checked.png">
</label>
