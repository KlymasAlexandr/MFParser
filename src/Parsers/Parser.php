<?php


namespace EvolutionCMS\MFParser\Parsers;


class Parser
{
    protected array $config = [
        'default'=>'defaultParse',
    ];

    public function parse(array $value):array
    {
        $result = [];
        if(!empty($value)){
            foreach ($value as $k=>$item){
                if(!empty($this->config[$k])){
                    $result[$k] = $this->{$this->config[$k]}($item);
                }else{
                    $result[$k] = $this->{$this->config['default']}($item);
                }
            }
        }

        return $result;
    }
    protected function defaultParse(array $value, $recursive = true)
    {
        if(!empty($value)){
            if(!empty($value['value'])){
                return $value['value'];
            }

            if(!empty($value['items']) && $recursive){
                return $this->parse($value['items']);
            }
        }

        return [];
    }
}