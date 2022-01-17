<div class="ui hidden divider"></div>
<div class="ui hidden divider"></div>
<div class="w100 toBottom">
    <div class="ui inverted blue  basic segment">
        <div class="ui container">
            <div class="ui  stackable grid">
                <div class="fluid twelve wide column">
                    <div class=" ui inverted small  header">
                        Tout droit réservés CICAF SAS
                    </div>
                    <div class="ui hidden divider"></div>
                    <div>
                        <a class="ui circular inverted big small  icon button">
                            <i class=" facebook icon"></i>
                        </a>
                        <a class="ui circular inverted big  small icon button">
                            <i class="twitter icon"></i>
                        </a>
                        <a class="ui circular  inverted big small icon button">
                            <i class="linkedin icon"></i>
                        </a>
                    </div>
                </div>
                <div class="four wide column">
                <div class="ui basic blue italique inverted segment">
                    Designed by Sertek plus
                </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
</div>
<?php if(isset($js)) {
    if(count($js) > 0) {
        foreach ($js as $key => $value) {
            echo $value;
        }
    }
    }?>
</body>
<html>