<?php

namespace Shapoapps\MultibotDriver\SessionHandlers;

use SessionHandlerInterface;
use Illuminate\Support\Carbon;
use Symfony\Component\Finder\Finder;
use Illuminate\Filesystem\Filesystem;

class FileMessengerSessionHandler implements SessionHandlerInterface
{

    protected $files;


    protected $path;


    protected $minutes;


    public function __construct(Filesystem $files, $path, $minutes)
    {
        $this->path = $path;
        $this->files = $files;
        $this->minutes = $minutes;
    }


    public function open($savePath, $sessionName)
    {
        return true;
    }


    public function close()
    {
        return true;
    }


    public function read($sessionId)
    {

	if(empty($sessionId)) { return; }

        if ($this->files->isFile($path = $this->path.'/'.$sessionId)) {
            if ($this->files->lastModified($path) >= Carbon::now()->subMinutes($this->minutes)->getTimestamp()) {
                return $this->files->sharedGet($path);
            }
        }

        return '';
    }


    public function write($sessionId, $data)
    {

	if(empty($sessionId)) { return; }

        $this->files->put($this->path.'/'.$sessionId, $data, true);

        return true;
    }


    public function destroy($sessionId)
    {

	if(empty($sessionId)) { return; }

        $this->files->delete($this->path.'/'.$sessionId);

        return true;
    }


    public function gc($lifetime)
    {
        $files = Finder::create()
                    ->in($this->path)
                    ->files()
                    ->ignoreDotFiles(true)
                    ->date('<= now - '.$lifetime.' seconds');

        foreach ($files as $file) {
            $this->files->delete($file->getRealPath());
        }
    }
}
