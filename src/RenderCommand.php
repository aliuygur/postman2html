<?php namespace Alioygur\Postman2HTML;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class RenderCommand extends Command
{
    protected function configure()
    {
        $this->setName('render')
            ->setDescription('convert postman collection to html')
            ->addArgument('inputfile', InputArgument::REQUIRED, 'input file')
            ->addArgument('outputfile', InputArgument::OPTIONAL, 'output file', 'output.html');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $collectionFile = new CollectionFile($input->getArgument('inputfile'));

        file_put_contents($input->getArgument('outputfile'), $collectionFile->render());

        $filePath = realpath($input->getArgument('outputfile'));

        $output->writeln("<info>The output file is created at, {$filePath}</info>");
    }
}